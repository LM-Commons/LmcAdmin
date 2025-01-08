<?php

declare(strict_types=1);

namespace Lmc\Admin\Options;

use Laminas\Stdlib\AbstractOptions;

class ModuleOptions extends AbstractOptions
{
    protected bool $useAdminLayout = true;

    protected string $adminLayoutTemplate = 'layout/lmcadmin';

    /**
     * @inheritDoc
     */
    public function __construct($options = null)
    {
        $this->__strictMode__ = false;
        parent::__construct($options);
    }

    public function getUseAdminLayout(): bool
    {
        return $this->useAdminLayout;
    }

    public function setUseAdminLayout(bool $useAdminLayout): void
    {
        $this->useAdminLayout = $useAdminLayout;
    }

    public function getAdminLayoutTemplate(): string
    {
        return $this->adminLayoutTemplate;
    }

    public function setAdminLayoutTemplate(string $adminLayoutTemplate): void
    {
        $this->adminLayoutTemplate = $adminLayoutTemplate;
    }
}
