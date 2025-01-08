<?php

declare(strict_types=1);

namespace LmcTest\Admin\Options;

use Lmc\Admin\Options\ModuleOptions;
use Lmc\Admin\Options\ModuleOptionsFactory;
use PHPUnit\Framework\TestCase;
use Psr\Container\ContainerInterface;

class ModuleOptionsFactoryTest extends TestCase
{
    public function testFactoryNoConfig(): void
    {
        $config    = [];
        $container = $this->createMock(ContainerInterface::class);
        $container->expects($this->once())->method('get')->with('config')->willReturn($config);
        $factory = new ModuleOptionsFactory();
        $options = $factory($container, '');
        $this->assertInstanceOf(ModuleOptions::class, $options);
    }

    public function testFactoryConfig(): void
    {
        $config    = [
            'lmc_admin' => [
                'use_admin_layout'      => false,
                'admin_layout_template' => 'foo/bar',
            ],
        ];
        $container = $this->createMock(ContainerInterface::class);
        $container->expects($this->once())->method('get')->with('config')->willReturn($config);
        $factory = new ModuleOptionsFactory();
        $options = $factory($container, '');
        $this->assertInstanceOf(ModuleOptions::class, $options);
        $this->assertFalse($options->getUseAdminLayout());
        $this->assertEquals('foo/bar', $options->getAdminLayoutTemplate());
    }
}
