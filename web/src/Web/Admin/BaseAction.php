<?php

declare(strict_types=1);

namespace App\Web\Admin;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ResponseFactoryInterface;
use Yiisoft\Http\Status;
use Yiisoft\User\CurrentUser;
use Yiisoft\Yii\View\Renderer\ViewRenderer;

abstract readonly class BaseAction
{
    public function __construct(
        protected ViewRenderer $viewRenderer,
        protected CurrentUser $currentUser,
        protected ResponseFactoryInterface $responseFactory,
    ) {}

    public function __invoke(): ResponseInterface
    {
        // Redirect guest users to login
        if ($this->currentUser->isGuest()) {
            return $this->responseFactory
                ->createResponse(Status::FOUND)
                ->withHeader('Location', '/login');
        }

        return $this->renderPage();
    }

    /**
     * Render the page content
     */
    abstract protected function renderPage(): ResponseInterface;
}
