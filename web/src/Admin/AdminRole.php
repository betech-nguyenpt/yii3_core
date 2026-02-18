<?php

declare(strict_types=1);

namespace App\Admin;

final readonly class AdminRole
{
    private function __construct(
        public int $id,
        public string $name,
        public string $code,
        public int $weight,
    ) {}

    public static function create(
        int $id,
        string $name,
        string $code,
        int $weight = 0,
    ): self {
        return new self(
            id: $id,
            name: $name,
            code: $code,
            weight: $weight,
        );
    }

    public function isHigherPriority(AdminRole $other): bool
    {
        return ($this->weight < $other->weight);
    }

    public function isLowerPriority(AdminRole $other): bool
    {
        return ($this->weight > $other->weight);
    }
}
