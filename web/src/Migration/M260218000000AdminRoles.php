<?php

declare(strict_types=1);

namespace App\Migration;

use Yiisoft\Db\Migration\MigrationBuilder;
use Yiisoft\Db\Migration\RevertibleMigrationInterface;
use Yiisoft\Db\Schema\Column\ColumnBuilder;

final class M260218000000AdminRoles implements RevertibleMigrationInterface
{
    public function up(MigrationBuilder $b): void
    {
        $b->createTable('{{%admin_roles}}', [
            'id' => ColumnBuilder::primaryKey(),
            'name' => ColumnBuilder::string()->notNull()->comment('Name of role'),
            'code' => ColumnBuilder::string()->notNull()->comment('Code of role'),
            'weight' => ColumnBuilder::smallint()->defaultValue(0)->comment('Weight of role'),
        ]);

        $b->createIndex('{{%admin_roles}}', 'unique_code', 'code', 'UNIQUE');
    }

    public function down(MigrationBuilder $b): void
    {
        $b->dropTable('{{%admin_roles}}');
    }
}
