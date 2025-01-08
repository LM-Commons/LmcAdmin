<?php

declare(strict_types=1);

namespace LmcTest\Admin\Listener;

use Lmc\Admin\Listener\LayoutTemplateSelectListener;
use Lmc\Admin\Listener\LayoutTemplateSelectListenerFactory;
use Lmc\Admin\Options\ModuleOptions;
use PHPUnit\Framework\TestCase;
use Psr\Container\ContainerInterface;

class LayoutTemplateSelectListenerFactoryTest extends TestCase
{
    public function testFactory(): void
    {
        $options   = new ModuleOptions();
        $container = $this->createMock(ContainerInterface::class);
        $container->expects($this->once())->method('get')->willReturn($options);
        $factory  = new LayoutTemplateSelectListenerFactory();
        $listener = $factory($container, '');
        $this->assertInstanceOf(LayoutTemplateSelectListener::class, $listener);
    }
}
