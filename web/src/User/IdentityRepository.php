<?php

declare(strict_types=1);

namespace App\User;

use Yiisoft\Auth\IdentityInterface;
use Yiisoft\Auth\IdentityRepositoryInterface;

final readonly class IdentityRepository implements IdentityRepositoryInterface
{
    public function __construct(
        private AdminUserRepository $adminUserRepository,
    ) {}

    public function findIdentity(string $id): ?IdentityInterface
    {
        $adminUser = $this->adminUserRepository->findOneById((int) $id);

        if ($adminUser === null) {
            return null;
        }

        return Identity::fromAdminUser($adminUser);
    }

    public function findIdentityByToken(string $token, string $type): ?IdentityInterface
    {
        return null;
    }

    /**
     * Find identity by username and password.
     * This method is used for login authentication.
     */
    public function findByUsernameAndPassword(string $username, string $password): ?IdentityInterface
    {
        $adminUser = $this->adminUserRepository->findOneByUsername($username);

        if ($adminUser === null) {
            return null;
        }

        // Verify the password using bcrypt
        if (!password_verify($password, $adminUser->password)) {
            return null;
        }

        // Check if user is active
        if (!$adminUser->isActive()) {
            return null;
        }

        return Identity::fromAdminUser($adminUser);
    }
}
