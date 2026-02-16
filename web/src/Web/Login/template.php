<?php

declare(strict_types=1);

use App\Shared\ApplicationParams;
use Yiisoft\View\WebView;

/**
 * @var WebView $this
 * @var ApplicationParams $applicationParams
 * @var string|null $error
 * @var string|null $csrf
 */

$this->setTitle('Login - ' . $applicationParams->name);
$error = $error ?? null;
?>

<div class="text-center">
    <h1>Login</h1>

    <p>Please enter your credentials to access the application.</p>

    <?php if ($error): ?>
        <div style="color: red; margin: 10px 0; padding: 10px; border: 1px solid red; border-radius: 4px;">
            <?= htmlspecialchars($error) ?>
        </div>
    <?php endif; ?>

    <form method="POST" action="/login">
        <?php if ($csrf): ?>
            <input type="hidden" name="<?= htmlspecialchars($csrf->getParameterName()) ?>" value="<?= htmlspecialchars($csrf->getToken()) ?>">
        <?php endif; ?>

        <div class="form-group" style="margin-bottom: 15px;">
            <label for="username" style="display: block; margin-bottom: 5px;">Username:</label>
            <input type="text" id="username" name="username" required style="padding: 8px; width: 250px;">
        </div>

        <div class="form-group" style="margin-bottom: 15px;">
            <label for="password" style="display: block; margin-bottom: 5px;">Password:</label>
            <input type="password" id="password" name="password" required style="padding: 8px; width: 250px;">
        </div>

        <button type="submit" class="btn btn-primary" style="padding: 10px 20px;">Sign In</button>
    </form>

    <p style="margin-top: 20px;">
        <a href="/">Back to Home</a>
    </p>

    <hr style="margin-top: 30px;">

    <p style="font-size: 12px; color: #666;">
        <strong>Demo Credentials:</strong><br>
        Username: admin<br>
        Password: admin123<br><br>
        OR<br><br>
        Username: user<br>
        Password: user123
    </p>
</div>
