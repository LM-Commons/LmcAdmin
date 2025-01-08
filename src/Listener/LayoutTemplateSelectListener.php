<?php

declare(strict_types=1);

namespace Lmc\Admin\Listener;

use Laminas\EventManager\AbstractListenerAggregate;
use Laminas\EventManager\EventManagerInterface;
use Laminas\Mvc\Controller\AbstractController;
use Laminas\Mvc\MvcEvent;
use Lmc\Admin\Options\ModuleOptions;

use function str_starts_with;

class LayoutTemplateSelectListener extends AbstractListenerAggregate
{
    public function __construct(protected ModuleOptions $moduleOptions)
    {
    }

    /**
     * @inheritDoc
     */
    public function attach(EventManagerInterface $events, $priority = 1)
    {
        $this->listeners[] = $events->attach(MvcEvent::EVENT_DISPATCH, [$this, 'selectLayoutBasedOnRoute'], $priority);
    }

    public function selectLayoutBasedOnRoute(MvcEvent $event): void
    {
        if (! $this->getModuleOptions()->getUseAdminLayout()) {
            return;
        }

        $routeMatch = $event->getRouteMatch();
        /** @var AbstractController $controller */
        $controller = $event->getTarget();
        if (
            ! str_starts_with($routeMatch->getMatchedRouteName(), 'lmcadmin')
            || $controller->getEvent()->getResult()->terminate()
        ) {
            return;
        }
        $controller->layout($this->getModuleOptions()->getAdminLayoutTemplate());
    }

    private function getModuleOptions(): ModuleOptions
    {
        return $this->moduleOptions;
    }
}
