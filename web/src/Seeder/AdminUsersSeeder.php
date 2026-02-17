<?php

declare(strict_types=1);

namespace App\Seeder;

use Yiisoft\Db\Connection\ConnectionInterface;

final class AdminUsersSeeder
{
    public function __construct(private ConnectionInterface $db) {}

    public function run(): void
    {
        $adminUsers = [
            [
                'username' => 'sadmin',
                'email' => 'sadmin@example.com',
                'fullname' => 'Super Administrator',
                'phone' => '+84123456789',
                'password' => password_hash('Sadmin123', PASSWORD_BCRYPT),
                'role_id' => 1,
                'status' => 1,
                'created_by' => 1,
            ],
            [
                'username' => 'admin1',
                'email' => 'admin1@example.com',
                'fullname' => 'John Administrator',
                'phone' => '+84987654321',
                'password' => password_hash('Admin@1234', PASSWORD_BCRYPT),
                'role_id' => 2,
                'status' => 1,
                'created_by' => 1,
            ],
            [
                'username' => 'admin2',
                'email' => 'admin2@example.com',
                'fullname' => 'Jane Administrator',
                'phone' => '+84912345678',
                'password' => password_hash('Admin@2345', PASSWORD_BCRYPT),
                'role_id' => 2,
                'status' => 1,
                'created_by' => 1,
            ],
            [
                'username' => 'support',
                'email' => 'support@example.com',
                'fullname' => 'Support Staff',
                'phone' => '+84898765432',
                'password' => password_hash('Support@1234', PASSWORD_BCRYPT),
                'role_id' => 3,
                'status' => 1,
                'created_by' => 1,
            ],
        ];

        foreach ($adminUsers as $user) {
            $this->db->createCommand()->insert('{{%admin_users}}', $user)->execute();
        }

        echo "Admin users seeded successfully!\n";
    }
}
