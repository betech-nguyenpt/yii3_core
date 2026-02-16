<?php

declare(strict_types=1);

namespace App\Web\HomePage;

use Psr\Http\Message\ResponseInterface;
use Yiisoft\Yii\View\Renderer\ViewRenderer;
use Yiisoft\User\CurrentUser;

final readonly class Action
{
    public function __construct(
        private ViewRenderer $viewRenderer,
        private CurrentUser $currentUser,
    ) {}

    public function __invoke(): ResponseInterface
    {
        return $this->viewRenderer->render(__DIR__ . '/template', [
            'currentUser' => $this->currentUser,
        ]);
    }
}
