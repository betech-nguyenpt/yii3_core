<?php

declare(strict_types=1);

use App\Admin\AdminRolePermissionRepository;
use App\Admin\AdminRoleRepository;
use App\User\AdminUserRepository;
use App\User\Identity;
use App\User\IdentityRepository;
use Yiisoft\Auth\IdentityRepositoryInterface;
use Yiisoft\Auth\AuthenticationMethodInterface;
use Yiisoft\Session\Session;
use Yiisoft\Session\SessionInterface;
use Yiisoft\User\Method\WebAuth;
use Yiisoft\User\CurrentUser;
use Yiisoft\Definitions\Reference;

return [
    SessionInterface::class => [
        'class' => Session::class,
        '__construct()' => [
            ['cookie_secure' => false],
            null,
        ],
    ],
    AdminUserRepository::class => [
        'class' => AdminUserRepository::class,
        '__construct()' => [
            'connection' => Reference::to('Yiisoft\Db\Connection\ConnectionInterface'),
        ],
    ],
    IdentityRepositoryInterface::class => [
        'class' => IdentityRepository::class,
        '__construct()' => [
            'adminUserRepository' => Reference::to(AdminUserRepository::class),
            'adminRoleRepository' => Reference::to(AdminRoleRepository::class),
            'adminRolePermissionRepository' => Reference::to(AdminRolePermissionRepository::class),
        ],
    ],
    AuthenticationMethodInterface::class => WebAuth::class,
    CurrentUser::class => [
        'withSession()' => [Reference::to(SessionInterface::class)]
    ],
];
