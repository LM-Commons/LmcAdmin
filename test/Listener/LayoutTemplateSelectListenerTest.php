<?php

declare(strict_types=1);

namespace LmcTest\Admin\Listener;

use Laminas\EventManager\EventManagerInterface;
use Laminas\Mvc\MvcEvent;
use Laminas\Test\PHPUnit\Controller\AbstractControllerTestCase;
use Lmc\Admin\Listener\LayoutTemplateSelectListener;
use Lmc\Admin\Options\ModuleOptions;

class LayoutTemplateSelectListenerTest extends AbstractControllerTestCase
{
    public function testAttach(): void
    {
        $events        = $this->createMock(EventManagerInterface::class);
        $moduleOptions = new ModuleOptions([]);
        $listener      = new LayoutTemplateSelectListener($moduleOptions);
        $priority      = 10;
        $events->expects($this->once())->method('attach')->with(
            MvcEvent::EVENT_DISPATCH,
            [$listener, 'selectLayoutBasedOnRoute'],
            $priority
        );
        $listener->attach($events, $priority);
    }

    public function testUseAdminLayoutFalse(): void
    {
        $event         = $this->createMock(MvcEvent::class);
        $moduleOptions = new ModuleOptions([
            'use_admin_layout' => false,
        ]);
        // The listener should return early and not try to get the route
        $event->expects($this->never())->method('getRouteMatch');
        $listener = new LayoutTemplateSelectListener($moduleOptions);
        $listener->selectLayoutBasedOnRoute($event);
    }

    public function testUseAdminLayoutTrue(): void
    {
        $this->setApplicationConfig(
            include __DIR__ . '/../test.application.config.php'
        );
        // Listener should set the layout template to layout/admin
        $this->dispatch('/admin');
        $this->assertResponseStatusCode(200);
        $this->assertTemplateName('layout/lmcadmin');
    }

    /**
     * Test that the listener does not change the layout when the route is not an admin route
     */
    public function testRouteNotMatched(): void
    {
        $this->setApplicationConfig(
            [
                'modules'                 => [
                    'Laminas\Router',
                    'Lmc\Admin',
                ],
                'module_listener_options' => [
                    'config_glob_paths' => [
                        __DIR__ . '/testing.config.php',
                    ],
                ],
            ]
        );
        // Listener should set the layout template to layout/admin
        $this->dispatch('/');
        $this->assertResponseStatusCode(200);
        $this->assertNotTemplateName('layout/admin');
    }

    /** Test that layout is not set when an admin controller returns a view set to terminate */
    public function testTerminate(): void
    {
        $this->setApplicationConfig(
            [
                'modules'                 => [
                    'Laminas\Router',
                    'Lmc\Admin',
                ],
                'module_listener_options' => [
                    'config_glob_paths' => [
                        __DIR__ . '/testing.config.php',
                    ],
                    'module_paths'      => [],
                ],
            ]
        );

        // Listener should not set the layout template to layout/admin or layout/layout
        // because the view is set to terminate
        $this->dispatch('/admin/terminate');
        $this->assertResponseStatusCode(200);
        $this->assertNotTemplateName('layout/layout');
        $this->assertNotTemplateName('layout/admin');
    }
}
