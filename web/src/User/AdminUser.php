<?php

declare(strict_types=1);

namespace App\User;

use DateTimeImmutable;

final readonly class AdminUser
{
    private function __construct(
        public int $id,
        public string $username,
        public string $email,
        public string $phone,
        public string $fullname,
        public string $password,
        public ?string $tempPass,
        public int $roleId,
        public int $status,
        public DateTimeImmutable $createdDate,
        public int $createdBy,
    ) {}

    public static function create(
        int $id,
        string $username,
        string $email,
        string $phone,
        string $fullname,
        string $password,
        ?string $tempPass = null,
        int $roleId = 0,
        int $status = 1,
        ?DateTimeImmutable $createdDate = null,
        int $createdBy = 0,
    ): self {
        return new self(
            id: $id,
            username: $username,
            email: $email,
            phone: $phone,
            fullname: $fullname,
            password: $password,
            tempPass: $tempPass,
            roleId: $roleId,
            status: $status,
            createdDate: $createdDate ?? new DateTimeImmutable(),
            createdBy: $createdBy,
        );
    }

    public function isActive(): bool
    {
        return $this->status === 1;
    }
}
