<?php

declare(strict_types=1);

namespace App\User;

use App\Admin\AdminRole;
use App\Admin\AdminRolePermissionRepository;
use Yiisoft\Auth\IdentityInterface;
use Yiisoft\Router\CurrentRoute;

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
        private array $permissions = [],
    ) {}

    public static function fromAdminUser(AdminUser $user, string $roleName = '', array $permissions = []): self
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
            permissions: $permissions,
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

    /**
     * Check if user has permission to access the current route
     */
    public function canAccess(CurrentRoute $currentRoute): bool {
        // return true;
        // Check if user is active
        if (!$this->isActive()) {
            return false;
        }

        // Superadmin has access to everything
        if ($this->roleId == AdminRole::SUPER_ADMIN_ROLE_ID) {
            return true;
        }

        // Extract route parameters
        $route = $currentRoute->getUri()->__toString();
        
        // Parse route: /admin/admin-user/index -> module=admin, controller=admin-user, action=index
        $parts = array_values(array_filter(explode('/', trim($route, '/'))));
        
        if (count($parts) < 3) {
            return false;
        }

        $module     = $parts[0] ?? '';
        $controller = $parts[1] ?? '';
        $action     = $parts[2] ?? '';

        // Validate extracted parts
        if (empty($module) || empty($controller) || empty($action)) {
            return false;
        }

        // Check if permission structure exists
        if (!isset($this->permissions[$module][$controller])) {
            return false;
        }

        // Check if action is in allowed actions
        return in_array($action, $this->permissions[$module][$controller], true);
    }
}