<?php

declare(strict_types=1);

return [
    'lmc_admin'    => [
        'use_admin_layout' => false,
    ],
    'view_manager' => [
        'template_map' => [
            'layout/layout' => __DIR__ . '/../view/testlayout.phtml',
        ],
    ],
];
