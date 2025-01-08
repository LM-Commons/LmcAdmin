<?php

declare(strict_types=1);

namespace Lmc\Admin;

class Module
{
    public function getConfig(): array
    {
        $provider = new ConfigProvider();

        return [
            'service_manager' => $provider->getDependencyConfig(),
            'view_manager'    => $provider->getViewManagerConfig(),
            'lmc_admin'       => $provider->getModuleConfig(),
            'controllers'     => $provider->getControllerConfig(),
            'navigation'      => $provider->getNavigationConfig(),
            'router'          => $provider->getRouterConfig(),
            'listeners'       => $provider->getListenerConfig(),
        ];
    }
}
