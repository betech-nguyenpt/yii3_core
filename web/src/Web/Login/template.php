<?php

declare(strict_types=1);

use App\Shared\ApplicationParams;
use Yiisoft\View\WebView;

/**
 * @var WebView $this
 * @var ApplicationParams $applicationParams
 */

$this->setTitle('Login - ' . $applicationParams->name);
?>

<div class="text-center">
    <h1>Login</h1>

    <p>Please enter your credentials to access the application.</p>

    <form method="POST" action="">
        <div class="form-group">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>
        </div>

        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
        </div>

        <button type="submit" class="btn btn-primary">Sign In</button>
    </form>

    <p>
        <a href="/">Back to Home</a>
    </p>
</div>
