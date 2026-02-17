<?php

declare(strict_types=1);

namespace App\Migration;

use Yiisoft\Db\Expression\Expression;
use Yiisoft\Db\Migration\MigrationBuilder;
use Yiisoft\Db\Migration\RevertibleMigrationInterface;
use Yiisoft\Db\Schema\Column\ColumnBuilder;

final class M260217000000AdminUsers implements RevertibleMigrationInterface
{
    public function up(MigrationBuilder $b): void
    {
        $b->createTable('{{%admin_users}}', [
            'id' => ColumnBuilder::primaryKey(),
            'username' => ColumnBuilder::string(),
            'phone' => ColumnBuilder::string(),
            'email' => ColumnBuilder::string(),
            'password' => ColumnBuilder::text(),
            'temp_pass' => ColumnBuilder::text(),
            'fullname' => ColumnBuilder::string(),
            'role_id' => ColumnBuilder::integer()->defaultValue(0)->comment('Id of role'),
            'status' => ColumnBuilder::tinyint()->defaultValue(1)->comment('Status'),
            'created_date' => ColumnBuilder::datetime()->defaultValue(new Expression('current_timestamp()'))->comment('Created date'),
            'created_by' => ColumnBuilder::integer()->defaultValue(0)->comment('Created by'),
        ]);

        $b->createIndex('{{%admin_users}}', 'unique_username', 'username', 'UNIQUE');
    }


    public function down(MigrationBuilder $b): void
    {
        $b->dropTable('{{%admin_users}}');
    }
}