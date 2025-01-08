<?php

declare(strict_types=1);

namespace Lmc\Admin\Listener;

use Laminas\ServiceManager\Factory\FactoryInterface;
use Lmc\Admin\Options\ModuleOptions;
use Psr\Container\ContainerInterface;

class LayoutTemplateSelectListenerFactory implements FactoryInterface
{
    /**
     * @inheritDoc
     */
    public function __invoke(
        ContainerInterface $container,
        $requestedName,
        ?array $options = null
    ): LayoutTemplateSelectListener {
        return new LayoutTemplateSelectListener($container->get(ModuleOptions::class));
    }
}
