<?php

declare(strict_types=1);

namespace App\Web\Admin;

use App\Admin\AdminRolePermissionRepository;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ResponseFactoryInterface;
use Yiisoft\Http\Status;
use Yiisoft\Router\CurrentRoute;
use Yiisoft\User\CurrentUser;
use Yiisoft\Yii\View\Renderer\ViewRenderer;

abstract readonly class BaseAction
{
    public function __construct(
        protected ViewRenderer $viewRenderer,
        protected CurrentUser $currentUser,
        protected ResponseFactoryInterface $responseFactory,
        protected CurrentRoute $currentRoute,
    ) {}

    public function __invoke(): ResponseInterface
    {
        // Redirect guest users to login
        if ($this->currentUser->isGuest()) {
            return $this->responseFactory
                ->createResponse(Status::FOUND)
                ->withHeader('Location', '/login');
        }
        // Check if current user can access current action
        if (!$this->currentUser->getIdentity()->canAccess($this->currentRoute)) {
            return $this->responseFactory
                ->createResponse(Status::FORBIDDEN)->withStatus(Status::FORBIDDEN, '123');// Access denied 404 code
        }

        return $this->renderPage();
    }

    /**
     * Render the page content
     */
    abstract protected function renderPage(): ResponseInterface;
}
