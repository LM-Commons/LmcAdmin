<?php

declare(strict_types=1);

namespace Lmc\Admin\Navigation\Service;

use Laminas\Navigation\Service\DefaultNavigationFactory;

/**
 * Factory for the LmcAdmin admin navigation
 */
class AdminNavigationFactory extends DefaultNavigationFactory
{
    /**
     * @inheritDoc
     */
    protected function getName(): string
    {
        return 'admin';
    }
}
