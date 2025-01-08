<?php

declare(strict_types=1);

return [
    'modules'                 => [
        'Laminas\Navigation',
        'Laminas\Router',
        'Lmc\Admin',
    ],
    'module_listener_options' => [
        'config_glob_paths' => [
            __DIR__ . '/testing.config.php',
        ],
        'module_paths'      => [],
    ],
];
