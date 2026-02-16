<?php

declare(strict_types=1);

namespace App\User;

use Yiisoft\Auth\IdentityInterface;
use Yiisoft\Auth\IdentityRepositoryInterface;

final readonly class IdentityRepository implements IdentityRepositoryInterface
{
    /**
     * Simple user database for demo purposes.
     * In production, this should be replaced with a real database.
     *
     * @var array
     */
    private const USERS = [
        [
            'id' => '1',
            'username' => 'admin',
            'password' => 'admin123',
        ],
        [
            'id' => '2',
            'username' => 'user',
            'password' => 'user123',
        ],
    ];

    public function findIdentity(string $id): ?IdentityInterface
    {
        foreach (self::USERS as $user) {
            if ((string)$user['id'] === $id) {
                return new Identity($id, $user['username']);
            }
        }

        return null;
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
        foreach (self::USERS as $user) {
            if ($user['username'] === $username && $user['password'] === $password) {
                return new Identity($user['id'], $user['username']);
            }
        }

        return null;
    }
}
