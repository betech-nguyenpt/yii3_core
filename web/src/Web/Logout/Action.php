<?php

declare(strict_types=1);

namespace App\Web\Logout;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ResponseFactoryInterface;
use Yiisoft\Http\Status;
use Yiisoft\User\CurrentUser;

final readonly class Action
{
    public function __construct(
        private CurrentUser $currentUser,
        private ResponseFactoryInterface $responseFactory,
    ) {}

    public function __invoke(): ResponseInterface
    {
        $this->currentUser->logout();

        // Redirect to homepage
        return $this->responseFactory
            ->createResponse(Status::FOUND)
            ->withHeader('Location', '/');
    }
}
