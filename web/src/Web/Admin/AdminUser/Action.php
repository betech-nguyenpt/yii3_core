<?php

declare(strict_types=1);

namespace App\Web\Admin\AdminUser;

use App\Admin\AdminRole;
use App\User\AdminUserRepository;
use Psr\Http\Message\ResponseInterface;
use Yiisoft\Yii\View\Renderer\ViewRenderer;

final readonly class Action
{
    public function __construct(
        private ViewRenderer $viewRenderer,
        private AdminUserRepository $adminUserRepository,
    ) {}

    public function __invoke(): ResponseInterface
    {
        $allUsers = $this->adminUserRepository->findAll();
        
        // Filter out superadmin users (role_id = 1)
        $users = [];
        foreach ($allUsers as $user) {
            if ($user->roleId != AdminRole::SUPER_ADMIN_ROLE_ID) {
                $users[] = $user;
            }
        }

        return $this->viewRenderer->render(__DIR__ . '/index', [
            'users' => $users,
        ]);
    }
}
