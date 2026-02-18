<?php

declare(strict_types=1);

namespace App\Admin;

use Yiisoft\Db\Connection\ConnectionInterface;

final readonly class AdminRoleRepository
{
    public function __construct(
        private ConnectionInterface $connection,
    ) {}

    public function save(AdminRole $role): void
    {
        $data = [
            'name' => $role->name,
            'code' => $role->code,
            'weight' => $role->weight,
        ];

        if ($this->exists($role->id)) {
            $this->connection->createCommand()->update('{{%admin_roles}}', $data, ['id' => $role->id])->execute();
        } else {
            $data['id'] = $role->id;
            $this->connection->createCommand()->insert('{{%admin_roles}}', $data)->execute();
        }
    }

    public function findOneById(int $id): ?AdminRole
    {
        $data = $this->connection
            ->createQuery()
            ->from('{{%admin_roles}}')
            ->where(['id' => $id])
            ->one();

        return $this->createAdminRole($data);
    }

    public function findOneByCode(string $code): ?AdminRole
    {
        $data = $this->connection
            ->createQuery()
            ->from('{{%admin_roles}}')
            ->where(['code' => $code])
            ->one();

        return $this->createAdminRole($data);
    }

    /**
     * @return iterable<AdminRole>
     */
    public function findAll(): iterable
    {
        $data = $this->connection
            ->createQuery()
            ->from('{{%admin_roles}}')
            ->orderBy(['weight' => SORT_DESC])
            ->all();

        foreach ($data as $row) {
            yield $this->createAdminRole($row);
        }
    }

    /**
     * @return iterable<AdminRole>
     */
    public function findAllOrderByName(): iterable
    {
        $data = $this->connection
            ->createQuery()
            ->from('{{%admin_roles}}')
            ->orderBy(['name' => SORT_ASC])
            ->all();

        foreach ($data as $row) {
            yield $this->createAdminRole($row);
        }
    }

    public function deleteById(int $id): void
    {
        $this->connection->createCommand()->delete(
            '{{%admin_roles}}',
            ['id' => $id],
        )->execute();
    }

    public function deleteByCode(string $code): void
    {
        $this->connection->createCommand()->delete(
            '{{%admin_roles}}',
            ['code' => $code],
        )->execute();
    }

    public function exists(int $id): bool
    {
        return $this->connection->createQuery()
            ->from('{{%admin_roles}}')
            ->where(['id' => $id])
            ->exists();
    }

    public function existsByCode(string $code): bool
    {
        return $this->connection->createQuery()
            ->from('{{%admin_roles}}')
            ->where(['code' => $code])
            ->exists();
    }

    private function createAdminRole(?array $data): ?AdminRole
    {
        if ($data === null) {
            return null;
        }

        return AdminRole::create(
            id: (int) $data['id'],
            name: $data['name'],
            code: $data['code'],
            weight: (int) $data['weight'],
        );
    }
}
