<?php

declare(strict_types=1);

namespace App\Migration;

use Yiisoft\Db\Migration\MigrationBuilder;
use Yiisoft\Db\Migration\RevertibleMigrationInterface;
use Yiisoft\Db\Schema\Column\ColumnBuilder;

final class M260219000000AdminRolePermissions implements RevertibleMigrationInterface
{
    public function up(MigrationBuilder $b): void
    {
        $b->createTable('{{%admin_role_permissions}}', [
            'id' => ColumnBuilder::primaryKey(),
            'role_id' => ColumnBuilder::integer()->notNull()->comment('ID of admin role'),
            'module' => ColumnBuilder::string(50)->notNull()->comment('Module key'),
            'controller' => ColumnBuilder::string(100)->notNull()->comment('Controller key'),
            'actions' => ColumnBuilder::text()->notNull()->comment('Semicolon-separated list of actions'),
        ]);

        $b->createIndex('{{%admin_role_permissions}}', 'idx_role_module_controller', ['role_id', 'module', 'controller'], 'UNIQUE');
    }

    public function down(MigrationBuilder $b): void
    {
        $b->dropTable('{{%admin_role_permissions}}');
    }
}
