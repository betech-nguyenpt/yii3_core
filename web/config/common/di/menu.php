<?php

declare(strict_types=1);

use App\Web\Shared\MenuProvider;

/** @var array $params */

return [
    MenuProvider::class => [
        '__construct()' => [
            'menuConfig' => $params['system/menu'] ?? [],
        ],
    ],
];
