<?php

declare(strict_types=1);

namespace App\Web\Admin\AdminUser;

use App\Admin\AdminRole;
use App\Web\Admin\BaseAction;
use App\User\AdminUserRepository;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ResponseFactoryInterface;
use Yiisoft\Router\CurrentRoute;
use Yiisoft\User\CurrentUser;
use Yiisoft\Yii\View\Renderer\ViewRenderer;

final readonly class Action extends BaseAction
{
    public function __construct(
        ViewRenderer $viewRenderer,
        CurrentUser $currentUser,
        ResponseFactoryInterface $responseFactory,
        private AdminUserRepository $adminUserRepository, CurrentRoute $currentRoute
    ) {
        parent::__construct($viewRenderer, $currentUser, $responseFactory, $currentRoute);
    }

    protected function renderPage(): ResponseInterface
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
