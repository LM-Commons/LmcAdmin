<?php

declare(strict_types=1);

namespace LmcTest\Admin;

use Lmc\Admin\Module;
use PHPUnit\Framework\TestCase;

class ModuleTest extends TestCase
{
    public function testConfig(): void
    {
        $module = new Module();
        $this->assertIsArray($module->getConfig());
    }
}
