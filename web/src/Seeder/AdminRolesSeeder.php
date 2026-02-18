<?php

declare(strict_types=1);

namespace App\Seeder;

use Yiisoft\Db\Connection\ConnectionInterface;

final class AdminRolesSeeder
{
    public function __construct(private ConnectionInterface $db) {}

    public function run(): void
    {
        // Truncate the table first
        $this->db->createCommand()->truncateTable('{{%admin_roles}}')->execute();

        $roles = [
            [
                'id'    => 1,
                'name' => 'Super Administrator',
                'code' => 'super_admin',
                'weight' => 1,
            ],
            [
                'id'    => 2,
                'name' => 'Administrator',
                'code' => 'admin',
                'weight' => 2,
            ],
            [
                'id'    => 3,
                'name' => 'Manager',
                'code' => 'manager',
                'weight' => 10,
            ],
            [
                'id'    => 4,
                'name' => 'Support Staff',
                'code' => 'support',
                'weight' => 20,
            ],
            [
                'id'    => 5,
                'name' => 'User',
                'code' => 'user',
                'weight' => 30,
            ],
        ];

        foreach ($roles as $role) {
            $this->db->createCommand()->insert('{{%admin_roles}}', $role)->execute();
        }

        echo "Admin roles seeded successfully!\n";
    }
}
