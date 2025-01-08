<?php

declare(strict_types=1);

namespace Lmc\Admin\Options;

use Laminas\ServiceManager\Factory\FactoryInterface;
use Psr\Container\ContainerInterface;

class ModuleOptionsFactory implements FactoryInterface
{
    /**
     * @inheritDoc
     */
    public function __invoke(ContainerInterface $container, $requestedName, ?array $options = null): ModuleOptions
    {
        $config  = $container->get('config');
        $options = $config['lmc_admin'] ?? [];
        return new ModuleOptions($options);
    }
}
