<?php

declare(strict_types=1);

namespace App\User;

use Yiisoft\Auth\IdentityInterface;

final readonly class Identity implements IdentityInterface
{
    public function __construct(
        private string $id,
        private string $username,
        private string $email = '',
        private string $fullname = '',
        private string $phone = '',
        private int $roleId = 0,
        private int $status = 1,
        private string $roleName = '',
    ) {}

    public static function fromAdminUser(AdminUser $user, string $roleName = ''): self
    {
        return new self(
            id: (string) $user->id,
            username: $user->username,
            email: $user->email,
            fullname: $user->fullname,
            phone: $user->phone,
            roleId: $user->roleId,
            status: $user->status,
            roleName: $roleName,
        );
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getUsername(): string
    {
        return $this->username;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getFullname(): string
    {
        return $this->fullname;
    }

    public function getPhone(): string
    {
        return $this->phone;
    }

    public function getRoleId(): int
    {
        return $this->roleId;
    }

    public function getStatus(): int
    {
        return $this->status;
    }

    public function isActive(): bool
    {
        return $this->status === 1;
    }

    public function getRoleName(): string
    {
        return $this->roleName;
    }
}
