<?php

declare(strict_types=1);

namespace App\Seeder;

use Yiisoft\Db\Connection\ConnectionInterface;

final class AdminRolePermissionsSeeder
{
    public function __construct(private ConnectionInterface $db) {}

    public function run(): void
    {
        // Truncate the table first
        $this->db->createCommand()->truncateTable('{{%admin_role_permissions}}')->execute();

        $permissions = [
            // Super Admin (role_id=1) - Full access to all admin operations
            [
                'role_id' => 1,
                'module' => 'admin',
                'controller' => 'admin-user',
                'actions' => 'index;create;edit;delete',
            ],
            [
                'role_id' => 1,
                'module' => 'admin',
                'controller' => 'admin-role',
                'actions' => 'index;create;edit;delete',
            ],

            // Administrator (role_id=2) - Full access to admin module
            [
                'role_id' => 2,
                'module' => 'admin',
                'controller' => 'admin-user',
                'actions' => 'index;create;edit;delete',
            ],
            [
                'role_id' => 2,
                'module' => 'admin',
                'controller' => 'admin-role',
                'actions' => 'index;create;edit;delete',
            ],

            // Manager (role_id=3) - Read-only access to users and roles
            [
                'role_id' => 3,
                'module' => 'admin',
                'controller' => 'admin-user',
                'actions' => 'index',
            ],
            [
                'role_id' => 3,
                'module' => 'admin',
                'controller' => 'admin-role',
                'actions' => 'index',
            ],

            // Support Staff (role_id=4) - Limited access, view only
            [
                'role_id' => 4,
                'module' => 'admin',
                'controller' => 'admin-user',
                'actions' => 'index',
            ],

            // User (role_id=5) - No admin access (no permissions)
            // Intentionally left empty to demonstrate role with no permissions
        ];

        foreach ($permissions as $permission) {
            $this->db->createCommand()->insert('{{%admin_role_permissions}}', $permission)->execute();
        }

        echo "Admin role permissions seeded successfully!\n";
    }
}
