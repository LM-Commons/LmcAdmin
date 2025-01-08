<?php

declare(strict_types=1);

use Laminas\Router\Http\Literal;
use Laminas\ServiceManager\Factory\InvokableFactory;
use LmcTest\Admin\Assets\TestController;

return [
    'lmc_admin'    => [
        'use_admin_layout' => true,
    ],
    'view_manager' => [
        'template_map' => [
            'layout/layout' => __DIR__ . '/../view/testlayout.phtml',
            'home/index'    => __DIR__ . '/../view/home-index.phtml',
        ],
    ],
    'router'       => [
        'routes' => [
            'home'     => [
                'type'    => Literal::class,
                'options' => [
                    'route'    => '/',
                    'defaults' => [
                        'controller' => TestController::class,
                        'action'     => 'index',
                    ],
                ],
            ],
            'lmcadmin' => [
                'child_routes' => [
                    'terminate' => [
                        'type'    => Literal::class,
                        'options' => [
                            'route'    => '/terminate',
                            'defaults' => [
                                'controller' => TestController::class,
                                'action'     => 'terminate',
                            ],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'controllers'  => [
        'factories' => [
            TestController::class => InvokableFactory::class,
        ],
    ],
];
