<?php

declare(strict_types=1);

namespace App\User;

use DateTimeImmutable;
use Yiisoft\Db\Connection\ConnectionInterface;

final readonly class AdminUserRepository
{
    public function __construct(
        private ConnectionInterface $connection,
    ) {}

    public function save(AdminUser $user): void
    {
        $data = [
            'username' => $user->username,
            'email' => $user->email,
            'phone' => $user->phone,
            'fullname' => $user->fullname,
            'password' => $user->password,
            'temp_pass' => $user->tempPass,
            'role_id' => $user->roleId,
            'status' => $user->status,
            'created_date' => $user->createdDate,
            'created_by' => $user->createdBy,
        ];

        if ($this->exists($user->id)) {
            $this->connection->createCommand()->update('{{%admin_users}}', $data, ['id' => $user->id])->execute();
        } else {
            $data['id'] = $user->id;
            $this->connection->createCommand()->insert('{{%admin_users}}', $data)->execute();
        }
    }

    public function findOneByUsername(string $username): ?AdminUser
    {
        $data = $this->connection
            ->createQuery()
            ->from('{{%admin_users}}')
            ->where(['username' => $username])
            ->one();

        return $this->createAdminUser($data);
    }

    public function findOneById(int $id): ?AdminUser
    {
        $data = $this->connection
            ->createQuery()
            ->from('{{%admin_users}}')
            ->where(['id' => $id])
            ->one();

        return $this->createAdminUser($data);
    }

    /**
     * @return iterable<AdminUser>
     */
    public function findAll(): iterable
    {
        $data = $this->connection
            ->createQuery()
            ->from('{{%admin_users}}')
            ->all();

        foreach ($data as $row) {
            yield $this->createAdminUser($row);
        }
    }

    /**
     * @return iterable<AdminUser>
     */
    public function findAllActive(): iterable
    {
        $data = $this->connection
            ->createQuery()
            ->from('{{%admin_users}}')
            ->where(['status' => 1])
            ->all();

        foreach ($data as $row) {
            yield $this->createAdminUser($row);
        }
    }

    public function deleteById(int $id): void
    {
        $this->connection->createCommand()->delete(
            '{{%admin_users}}',
            ['id' => $id],
        )->execute();
    }

    public function deleteByUsername(string $username): void
    {
        $this->connection->createCommand()->delete(
            '{{%admin_users}}',
            ['username' => $username],
        )->execute();
    }

    public function exists(int $id): bool
    {
        return $this->connection->createQuery()
            ->from('{{%admin_users}}')
            ->where(['id' => $id])
            ->exists();
    }

    public function existsByUsername(string $username): bool
    {
        return $this->connection->createQuery()
            ->from('{{%admin_users}}')
            ->where(['username' => $username])
            ->exists();
    }

    private function createAdminUser(?array $data): ?AdminUser
    {
        if ($data === null) {
            return null;
        }

        return AdminUser::create(
            id: (int) $data['id'],
            username: $data['username'],
            email: $data['email'],
            phone: $data['phone'],
            fullname: $data['fullname'],
            password: $data['password'],
            tempPass: $data['temp_pass'],
            roleId: (int) $data['role_id'],
            status: (int) $data['status'],
            createdDate: new DateTimeImmutable($data['created_date']),
            createdBy: (int) $data['created_by'],
        );
    }
}
