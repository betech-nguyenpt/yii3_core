<?php

declare(strict_types=1);

namespace App\Migration;

use Yiisoft\Db\Migration\MigrationBuilder;
use Yiisoft\Db\Migration\RevertibleMigrationInterface;

final class M260217000000AdminUsers implements RevertibleMigrationInterface
{
    public function up(MigrationBuilder $b): void
    {
        $b->createTable('{{%admin_users}}', [
            'id' => $b->primaryKey(),
            'username' => $b->string(),
            'phone' => $b->string(),
            'email' => $b->string(),
            'password' => $b->text(),
            'temp_pass' => $b->text(),
            'fullname' => $b->string(),
            'role_id' => $b->integer()->defaultValue(0)->comment('Id of role'),
            'status' => $b->tinyInteger()->defaultValue(1)->comment('Status'),
            'created_date' => $b->dateTime()->defaultExpression('current_timestamp()')->comment('Created date'),
            'created_by' => $b->integer()->defaultValue(0)->comment('Created by'),
        ]);

        $b->createIndex('unique_username', '{{%admin_users}}', 'username', true);
    }

    public function down(MigrationBuilder $b): void
    {
        $b->dropTable('{{%admin_users}}');
    }
}