<?php

declare(strict_types=1);

namespace App\Admin;

final readonly class AdminRolePermission
{
    private function __construct(
        public int $id,
        public int $roleId,
        public string $module,
        public string $controller,
        public string $actions,
    ) {}

    public static function create(
        int $id,
        int $roleId,
        string $module,
        string $controller,
        string $actions,
    ): self {
        return new self(
            id: $id,
            roleId: $roleId,
            module: $module,
            controller: $controller,
            actions: $actions,
        );
    }

    /**
     * Get the list of actions as an array
     * 
     * @return string[]
     */
    public function getActionsList(): array
    {
        if (empty($this->actions)) {
            return [];
        }
        return array_filter(array_map('trim', explode(';', $this->actions)));
    }

    /**
     * Check if a specific action is allowed
     */
    public function canAccess(string $action): bool
    {
        return in_array($action, $this->getActionsList(), true);
    }
}
