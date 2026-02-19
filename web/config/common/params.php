<?php

declare(strict_types=1);

use App\Shared\ApplicationParams;
use App\Web\Shared\MenuProvider;
use Yiisoft\Aliases\Aliases;
use Yiisoft\Assets\AssetManager;
use Yiisoft\Db\Mysql\Dsn;
use Yiisoft\Definitions\Reference;
use Yiisoft\Router\CurrentRoute;
use Yiisoft\Router\UrlGeneratorInterface;
use Yiisoft\User\CurrentUser;
use Yiisoft\Yii\View\Renderer\CsrfViewInjection;

return [
    'application' => require __DIR__ . '/application.php',

    'yiisoft/aliases' => [
        'aliases' => require __DIR__ . '/aliases.php',
    ],

    'yiisoft/view' => [
        'basePath' => null,
        'parameters' => [
            'assetManager' => Reference::to(AssetManager::class),
            'applicationParams' => Reference::to(ApplicationParams::class),
            'aliases' => Reference::to(Aliases::class),
            'urlGenerator' => Reference::to(UrlGeneratorInterface::class),
            'currentRoute' => Reference::to(CurrentRoute::class),
            'currentUser' => Reference::to(CurrentUser::class),
            'menuProvider' => Reference::to(MenuProvider::class),
        ],
    ],

    'yiisoft/yii-view-renderer' => [
        'viewPath' => null,
        'layout' => '@src/Web/Shared/Layout/Main/layout.php',
        'injections' => [
            Reference::to(CsrfViewInjection::class),
        ],
    ],

    'yiisoft/db-mysql' => [
        'dns'   => new Dsn('mysql', 'yii3_mysql', 'yii3_web', '3306'),
        'username'  => 'root',
        'password'  => 'root',
    ],

    'yiisoft/db-migration' => [
        'newMigrationNamespace' => 'App\\Migration',
        'sourceNamespaces'      => ['App\\Migration'],
    ],
    'system/menu' => [
        // Menu for current Home page
        'back_menu' => [
            'home'      => [    // Home menu item
                'alias' => 'Home',
                'url'   => 'home',
            ],
            // TODO: Add the following routes when they are implemented:
            // 'admin'     => [    // Admin module dropdown
            //     'alias' => 'Admin Module',
            //     'children'  => [
            //         'user'  => [    // User menu item
            //             'alias' => 'User',
            //             'url'   => 'admin/admin-user/index',
            //         ],
            //         'role'  => [    // Role menu item
            //             'alias' => 'Role',
            //             'url'   => 'admin/admin-role/index',
            //         ],
            //     ],
            // ],
            // 'api'       => [    // Api module dropdown
            //     'alias' => 'Api Module',
            //     'children'  => [
            //         'api-request-log'   => [    // Request log menu item
            //             'alias' => 'Request log',
            //             'url'   => 'api/api-request-log/index',
            //         ],
            //     ],
            // ],
            // 'setting'   => [    // Setting menu item
            //     'alias' => 'Setting',
            //     'url'   => 'admin/admin-setting/index',
            // ],
        ],
    ],
];
