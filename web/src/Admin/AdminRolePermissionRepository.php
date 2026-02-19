<?php

declare(strict_types=1);

namespace App\Admin;

use Yiisoft\Db\Connection\ConnectionInterface;

final readonly class AdminRolePermissionRepository
{
    public function __construct(
        private ConnectionInterface $connection,
    ) {}

    public function save(AdminRolePermission $permission): void
    {
        $data = [
            'role_id' => $permission->roleId,
            'module' => $permission->module,
            'controller' => $permission->controller,
            'actions' => $permission->actions,
        ];

        if ($this->exists($permission->id)) {
            $this->connection->createCommand()->update('{{%admin_role_permissions}}', $data, ['id' => $permission->id])->execute();
        } else {
            $data['id'] = $permission->id;
            $this->connection->createCommand()->insert('{{%admin_role_permissions}}', $data)->execute();
        }
    }

    public function findOneById(int $id): ?AdminRolePermission
    {
        $data = $this->connection
            ->createQuery()
            ->from('{{%admin_role_permissions}}')
            ->where(['id' => $id])
            ->one();

        return $this->createAdminRolePermission($data);
    }

    /**
     * Find permission by role_id, module, and controller
     */
    public function findByRoleModuleController(int $roleId, string $module, string $controller): ?AdminRolePermission
    {
        $data = $this->connection
            ->createQuery()
            ->from('{{%admin_role_permissions}}')
            ->where(['role_id' => $roleId, 'module' => $module, 'controller' => $controller])
            ->one();

        return $this->createAdminRolePermission($data);
    }

    /**
     * Find all permissions for a specific role
     * 
     * @return iterable<AdminRolePermission>
     */
    public function findByRoleId(int $roleId): iterable
    {
        $data = $this->connection
            ->createQuery()
            ->from('{{%admin_role_permissions}}')
            ->where(['role_id' => $roleId])
            ->all();

        foreach ($data as $row) {
            yield $this->createAdminRolePermission($row);
        }
    }

    public function findPermissionsByRoleId(int $roleId): array
    {
        $retVal = [];
        $data = $this->connection
            ->createQuery()
            ->from('{{%admin_role_permissions}}')
            ->where(['role_id' => $roleId])
            ->all();

        foreach ($data as $row) {
            $retVal[$row['module']][$row['controller']] = explode(';', $row['actions']);
        }
        return $retVal;
    }

    /**
     * Find all permissions for a specific module
     * 
     * @return iterable<AdminRolePermission>
     */
    public function findByModule(string $module): iterable
    {
        $data = $this->connection
            ->createQuery()
            ->from('{{%admin_role_permissions}}')
            ->where(['module' => $module])
            ->all();

        foreach ($data as $row) {
            yield $this->createAdminRolePermission($row);
        }
    }

    /**
     * Get all permissions
     * 
     * @return iterable<AdminRolePermission>
     */
    public function findAll(): iterable
    {
        $data = $this->connection
            ->createQuery()
            ->from('{{%admin_role_permissions}}')
            ->orderBy(['role_id' => SORT_ASC, 'module' => SORT_ASC, 'controller' => SORT_ASC])
            ->all();

        foreach ($data as $row) {
            yield $this->createAdminRolePermission($row);
        }
    }

    public function delete(int $id): void
    {
        $this->connection->createCommand()->delete('{{%admin_role_permissions}}', ['id' => $id])->execute();
    }

    public function deleteByRoleId(int $roleId): void
    {
        $this->connection->createCommand()->delete('{{%admin_role_permissions}}', ['role_id' => $roleId])->execute();
    }

    public function exists(int $id): bool
    {
        return $this->connection
            ->createQuery()
            ->from('{{%admin_role_permissions}}')
            ->where(['id' => $id])
            ->exists();
    }

    private function createAdminRolePermission(?array $data): ?AdminRolePermission
    {
        if ($data === null) {
            return null;
        }

        return AdminRolePermission::create(
            id: (int)$data['id'],
            roleId: (int)$data['role_id'],
            module: (string)$data['module'],
            controller: (string)$data['controller'],
            actions: (string)$data['actions'],
        );
    }
}
