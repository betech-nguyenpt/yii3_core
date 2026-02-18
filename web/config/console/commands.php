<?php

declare(strict_types=1);

use App\Console;

return [
    'hello' => Console\HelloCommand::class,
    'seeder' => Console\SeederCommand::class,
    'seeder:admin-users' => Console\AdminUsersSeederCommand::class,
    'seeder:admin-roles' => Console\AdminRolesSeederCommand::class,
];
