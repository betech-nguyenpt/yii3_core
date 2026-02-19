<?php

declare(strict_types=1);

namespace App\Web\Login;

use App\User\IdentityRepository;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\ResponseFactoryInterface;
use Yiisoft\Http\Status;
use Yiisoft\Yii\View\Renderer\ViewRenderer;
use Yiisoft\User\CurrentUser;

final readonly class Action
{
    public function __construct(
        private ViewRenderer $viewRenderer,
        private IdentityRepository $identityRepository,
        private CurrentUser $currentUser,
        private ResponseFactoryInterface $responseFactory,
    ) {}

    public function __invoke(ServerRequestInterface $request): ResponseInterface
    {
        // If user is already logged in, redirect to home
        if (!$this->currentUser->isGuest()) {
            return $this->responseFactory
                ->createResponse(Status::FOUND)
                ->withHeader('Location', '/');
        }

        $method = $request->getMethod();

        if ($method === 'POST') {
            return $this->handleLogin($request);
        }

        return $this->viewRenderer->render(__DIR__ . '/template');
    }

    private function handleLogin(ServerRequestInterface $request): ResponseInterface
    {
        $body = $request->getParsedBody();
        $username = $body['username'] ?? '';
        $password = $body['password'] ?? '';

        if (empty($username) || empty($password)) {
            return $this->viewRenderer->render(__DIR__ . '/template', [
                'error' => 'Username and password are required.',
            ]);
        }

        $identity = $this->identityRepository->findByUsernameAndPassword($username, $password);

        if ($identity === null) {
            return $this->viewRenderer->render(__DIR__ . '/template', [
                'error' => 'Invalid username or password.',
            ]);
        }

        // Login the user
        $this->currentUser->login($identity);

        // Redirect to homepage
        return $this->responseFactory
            ->createResponse(Status::FOUND)
            ->withHeader('Location', '/');
    }
}
