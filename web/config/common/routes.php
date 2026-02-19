<?php

declare(strict_types=1);

use App\Web;
use Yiisoft\Router\Group;
use Yiisoft\Router\Route;

return [
    Group::create()
        ->routes(
            Route::get('/')
                ->action(Web\HomePage\Action::class)
                ->name('home'),
            Route::get('/login')
                ->action(Web\Login\Action::class)
                ->name('login'),
            Route::post('/login')
                ->action(Web\Login\Action::class)
                ->name('login.post'),
            Route::get('/logout')
                ->action(Web\Logout\Action::class)
                ->name('logout'),
            Route::get('/admin/admin-user/index')
                ->action(Web\Admin\AdminUser\Action::class)
                ->name('admin.admin-user.index'),
        ),
];
