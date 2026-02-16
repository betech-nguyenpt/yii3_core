<?php

declare(strict_types=1);

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
    IdentityRepositoryInterface::class => IdentityRepository::class,
    AuthenticationMethodInterface::class => WebAuth::class,
    CurrentUser::class => [
        'withSession()' => [Reference::to(SessionInterface::class)]
    ],
];
