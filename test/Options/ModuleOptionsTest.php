<?php

declare(strict_types=1);

namespace LmcTest\Admin\Options;

use Lmc\Admin\Options\ModuleOptions;
use PHPUnit\Framework\TestCase;

class ModuleOptionsTest extends TestCase
{
    public function testOptionsNoOptions(): void
    {
        $options = new ModuleOptions();
        $this->assertEquals(true, $options->getUseAdminLayout());
        $this->assertEquals('layout/lmcadmin', $options->getAdminLayoutTemplate());
    }

    public function testOptions(): void
    {
        $options = new ModuleOptions([
            'useAdminLayout'      => false,
            'adminLayoutTemplate' => 'foo/bar',
        ]);
        $this->assertEquals(false, $options->getUseAdminLayout());
        $this->assertEquals('foo/bar', $options->getAdminLayoutTemplate());
    }

    public function testOptionsSetters(): void
    {
        $options = new ModuleOptions();
        $options->setUseAdminLayout(false);
        $options->setAdminLayoutTemplate('foo');
        $this->assertEquals(false, $options->getUseAdminLayout());
        $this->assertEquals('foo', $options->getAdminLayoutTemplate());
    }
}
