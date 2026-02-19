<?php

declare(strict_types=1);

namespace App\Web\Admin\AdminRole;

use App\Admin\AdminRole;
use App\Admin\AdminRoleRepository;
use App\Web\Admin\BaseAction;
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
        private AdminRoleRepository $adminRoleRepository, CurrentRoute $currentRoute
    ) {
        parent::__construct($viewRenderer, $currentUser, $responseFactory, $currentRoute);
    }

    protected function renderPage(): ResponseInterface
    {
        $allRoles = $this->adminRoleRepository->findAll();
        
        // Filter out superadmin role (id = 1)
        $roles = [];
        foreach ($allRoles as $role) {
            if ($role->id != AdminRole::SUPER_ADMIN_ROLE_ID) {
                $roles[] = $role;
            }
        }

        return $this->viewRenderer->render(__DIR__ . '/index', [
            'roles' => $roles,
        ]);
    }
}
