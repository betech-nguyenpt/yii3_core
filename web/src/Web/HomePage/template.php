<?php

declare(strict_types=1);

use App\Shared\ApplicationParams;
use Yiisoft\View\WebView;
use Yiisoft\User\CurrentUser;

/**
 * @var WebView $this
 * @var ApplicationParams $applicationParams
 * @var CurrentUser $currentUser
 */

$this->setTitle($applicationParams->name);
?>

<div class="text-center">
    <h1>Hello!</h1>

    <?php if ($currentUser->isGuest()): ?>
        <p>Let's start something great with <strong>Yii3</strong>!</p>
    <?php else: ?>
        <p>Welcome back, <strong><?= htmlspecialchars($currentUser->getIdentity()->getUsername()) ?></strong><?php if ($currentUser->getIdentity()->getRoleName()): ?> (<?= htmlspecialchars($currentUser->getIdentity()->getRoleName()) ?>)<?php endif; ?>!</p>
    <?php endif; ?>

    <p>
        <a href="https://github.com/yiisoft/docs/tree/master/guide/en" target="_blank" rel="noopener">
            <i>Don't forget to check the guide.</i>
        </a>
    </p>
    <?php if ($currentUser->isGuest()): ?>
        <p>Let's start something great with <strong>Yii3</strong>!</p>
    <?php else: ?>
        <p>Welcome back, <strong><?= htmlspecialchars($currentUser->getIdentity()->getUsername()) ?></strong><?php if ($currentUser->getIdentity()->getRoleName()): ?> (<?= htmlspecialchars($currentUser->getIdentity()->getRoleName()) ?>)<?php endif; ?>!</p>
        <p>Welcome back, <strong><?= htmlspecialchars($currentUser->getIdentity()->getUsername()) ?></strong><?php if ($currentUser->getIdentity()->getRoleName()): ?> (<?= htmlspecialchars($currentUser->getIdentity()->getRoleName()) ?>)<?php endif; ?>!</p>
        <p>Welcome back, <strong><?= htmlspecialchars($currentUser->getIdentity()->getUsername()) ?></strong><?php if ($currentUser->getIdentity()->getRoleName()): ?> (<?= htmlspecialchars($currentUser->getIdentity()->getRoleName()) ?>)<?php endif; ?>!</p>
        <p>Welcome back, <strong><?= htmlspecialchars($currentUser->getIdentity()->getUsername()) ?></strong><?php if ($currentUser->getIdentity()->getRoleName()): ?> (<?= htmlspecialchars($currentUser->getIdentity()->getRoleName()) ?>)<?php endif; ?>!</p>
        <p>Welcome back, <strong><?= htmlspecialchars($currentUser->getIdentity()->getUsername()) ?></strong><?php if ($currentUser->getIdentity()->getRoleName()): ?> (<?= htmlspecialchars($currentUser->getIdentity()->getRoleName()) ?>)<?php endif; ?>!</p>
        <p>Welcome back, <strong><?= htmlspecialchars($currentUser->getIdentity()->getUsername()) ?></strong><?php if ($currentUser->getIdentity()->getRoleName()): ?> (<?= htmlspecialchars($currentUser->getIdentity()->getRoleName()) ?>)<?php endif; ?>!</p>
        <p>Welcome back, <strong><?= htmlspecialchars($currentUser->getIdentity()->getUsername()) ?></strong><?php if ($currentUser->getIdentity()->getRoleName()): ?> (<?= htmlspecialchars($currentUser->getIdentity()->getRoleName()) ?>)<?php endif; ?>!</p>
        <p>Welcome back, <strong><?= htmlspecialchars($currentUser->getIdentity()->getUsername()) ?></strong><?php if ($currentUser->getIdentity()->getRoleName()): ?> (<?= htmlspecialchars($currentUser->getIdentity()->getRoleName()) ?>)<?php endif; ?>!</p>
        <p>Welcome back, <strong><?= htmlspecialchars($currentUser->getIdentity()->getUsername()) ?></strong><?php if ($currentUser->getIdentity()->getRoleName()): ?> (<?= htmlspecialchars($currentUser->getIdentity()->getRoleName()) ?>)<?php endif; ?>!</p>
        <p>Welcome back, <strong><?= htmlspecialchars($currentUser->getIdentity()->getUsername()) ?></strong><?php if ($currentUser->getIdentity()->getRoleName()): ?> (<?= htmlspecialchars($currentUser->getIdentity()->getRoleName()) ?>)<?php endif; ?>!</p>
        <p>Welcome back, <strong><?= htmlspecialchars($currentUser->getIdentity()->getUsername()) ?></strong><?php if ($currentUser->getIdentity()->getRoleName()): ?> (<?= htmlspecialchars($currentUser->getIdentity()->getRoleName()) ?>)<?php endif; ?>!</p>
        <p>Welcome back, <strong><?= htmlspecialchars($currentUser->getIdentity()->getUsername()) ?></strong><?php if ($currentUser->getIdentity()->getRoleName()): ?> (<?= htmlspecialchars($currentUser->getIdentity()->getRoleName()) ?>)<?php endif; ?>!</p>
        <p>Welcome back, <strong><?= htmlspecialchars($currentUser->getIdentity()->getUsername()) ?></strong><?php if ($currentUser->getIdentity()->getRoleName()): ?> (<?= htmlspecialchars($currentUser->getIdentity()->getRoleName()) ?>)<?php endif; ?>!</p>
        <p>Welcome back, <strong><?= htmlspecialchars($currentUser->getIdentity()->getUsername()) ?></strong><?php if ($currentUser->getIdentity()->getRoleName()): ?> (<?= htmlspecialchars($currentUser->getIdentity()->getRoleName()) ?>)<?php endif; ?>!</p>
        <p>Welcome back, <strong><?= htmlspecialchars($currentUser->getIdentity()->getUsername()) ?></strong><?php if ($currentUser->getIdentity()->getRoleName()): ?> (<?= htmlspecialchars($currentUser->getIdentity()->getRoleName()) ?>)<?php endif; ?>!</p>
        <p>Welcome back, <strong><?= htmlspecialchars($currentUser->getIdentity()->getUsername()) ?></strong><?php if ($currentUser->getIdentity()->getRoleName()): ?> (<?= htmlspecialchars($currentUser->getIdentity()->getRoleName()) ?>)<?php endif; ?>!</p>
        <p>Welcome back, <strong><?= htmlspecialchars($currentUser->getIdentity()->getUsername()) ?></strong><?php if ($currentUser->getIdentity()->getRoleName()): ?> (<?= htmlspecialchars($currentUser->getIdentity()->getRoleName()) ?>)<?php endif; ?>!</p>
        <p>Welcome back, <strong><?= htmlspecialchars($currentUser->getIdentity()->getUsername()) ?></strong><?php if ($currentUser->getIdentity()->getRoleName()): ?> (<?= htmlspecialchars($currentUser->getIdentity()->getRoleName()) ?>)<?php endif; ?>!</p>
        <p>Welcome back, <strong><?= htmlspecialchars($currentUser->getIdentity()->getUsername()) ?></strong><?php if ($currentUser->getIdentity()->getRoleName()): ?> (<?= htmlspecialchars($currentUser->getIdentity()->getRoleName()) ?>)<?php endif; ?>!</p>
        <p>Welcome back, <strong><?= htmlspecialchars($currentUser->getIdentity()->getUsername()) ?></strong><?php if ($currentUser->getIdentity()->getRoleName()): ?> (<?= htmlspecialchars($currentUser->getIdentity()->getRoleName()) ?>)<?php endif; ?>!</p>
        <p>Welcome back, <strong><?= htmlspecialchars($currentUser->getIdentity()->getUsername()) ?></strong><?php if ($currentUser->getIdentity()->getRoleName()): ?> (<?= htmlspecialchars($currentUser->getIdentity()->getRoleName()) ?>)<?php endif; ?>!</p>
        <p>Welcome back, <strong><?= htmlspecialchars($currentUser->getIdentity()->getUsername()) ?></strong><?php if ($currentUser->getIdentity()->getRoleName()): ?> (<?= htmlspecialchars($currentUser->getIdentity()->getRoleName()) ?>)<?php endif; ?>!</p>
        <p>Welcome back, <strong><?= htmlspecialchars($currentUser->getIdentity()->getUsername()) ?></strong><?php if ($currentUser->getIdentity()->getRoleName()): ?> (<?= htmlspecialchars($currentUser->getIdentity()->getRoleName()) ?>)<?php endif; ?>!</p>
        <p>Welcome back, <strong><?= htmlspecialchars($currentUser->getIdentity()->getUsername()) ?></strong><?php if ($currentUser->getIdentity()->getRoleName()): ?> (<?= htmlspecialchars($currentUser->getIdentity()->getRoleName()) ?>)<?php endif; ?>!</p>
        <p>Welcome back, <strong><?= htmlspecialchars($currentUser->getIdentity()->getUsername()) ?></strong><?php if ($currentUser->getIdentity()->getRoleName()): ?> (<?= htmlspecialchars($currentUser->getIdentity()->getRoleName()) ?>)<?php endif; ?>!</p>
        <p>Welcome back, <strong><?= htmlspecialchars($currentUser->getIdentity()->getUsername()) ?></strong><?php if ($currentUser->getIdentity()->getRoleName()): ?> (<?= htmlspecialchars($currentUser->getIdentity()->getRoleName()) ?>)<?php endif; ?>!</p>
        <p>Welcome back, <strong><?= htmlspecialchars($currentUser->getIdentity()->getUsername()) ?></strong><?php if ($currentUser->getIdentity()->getRoleName()): ?> (<?= htmlspecialchars($currentUser->getIdentity()->getRoleName()) ?>)<?php endif; ?>!</p>
        <p>Welcome back, <strong><?= htmlspecialchars($currentUser->getIdentity()->getUsername()) ?></strong><?php if ($currentUser->getIdentity()->getRoleName()): ?> (<?= htmlspecialchars($currentUser->getIdentity()->getRoleName()) ?>)<?php endif; ?>!</p>
        <p>Welcome back, <strong><?= htmlspecialchars($currentUser->getIdentity()->getUsername()) ?></strong><?php if ($currentUser->getIdentity()->getRoleName()): ?> (<?= htmlspecialchars($currentUser->getIdentity()->getRoleName()) ?>)<?php endif; ?>!</p>
        <p>Welcome back, <strong><?= htmlspecialchars($currentUser->getIdentity()->getUsername()) ?></strong><?php if ($currentUser->getIdentity()->getRoleName()): ?> (<?= htmlspecialchars($currentUser->getIdentity()->getRoleName()) ?>)<?php endif; ?>!</p>
        <p>Welcome back, <strong><?= htmlspecialchars($currentUser->getIdentity()->getUsername()) ?></strong><?php if ($currentUser->getIdentity()->getRoleName()): ?> (<?= htmlspecialchars($currentUser->getIdentity()->getRoleName()) ?>)<?php endif; ?>!</p>
        <p>Welcome back, <strong><?= htmlspecialchars($currentUser->getIdentity()->getUsername()) ?></strong><?php if ($currentUser->getIdentity()->getRoleName()): ?> (<?= htmlspecialchars($currentUser->getIdentity()->getRoleName()) ?>)<?php endif; ?>!</p>
        <p>Welcome back, <strong><?= htmlspecialchars($currentUser->getIdentity()->getUsername()) ?></strong><?php if ($currentUser->getIdentity()->getRoleName()): ?> (<?= htmlspecialchars($currentUser->getIdentity()->getRoleName()) ?>)<?php endif; ?>!</p>
        <p>Welcome back, <strong><?= htmlspecialchars($currentUser->getIdentity()->getUsername()) ?></strong><?php if ($currentUser->getIdentity()->getRoleName()): ?> (<?= htmlspecialchars($currentUser->getIdentity()->getRoleName()) ?>)<?php endif; ?>!</p>
        <p>Welcome back, <strong><?= htmlspecialchars($currentUser->getIdentity()->getUsername()) ?></strong><?php if ($currentUser->getIdentity()->getRoleName()): ?> (<?= htmlspecialchars($currentUser->getIdentity()->getRoleName()) ?>)<?php endif; ?>!</p>
        <p>Welcome back, <strong><?= htmlspecialchars($currentUser->getIdentity()->getUsername()) ?></strong><?php if ($currentUser->getIdentity()->getRoleName()): ?> (<?= htmlspecialchars($currentUser->getIdentity()->getRoleName()) ?>)<?php endif; ?>!</p>
        <p>Welcome back, <strong><?= htmlspecialchars($currentUser->getIdentity()->getUsername()) ?></strong><?php if ($currentUser->getIdentity()->getRoleName()): ?> (<?= htmlspecialchars($currentUser->getIdentity()->getRoleName()) ?>)<?php endif; ?>!</p>
        <p>Welcome back, <strong><?= htmlspecialchars($currentUser->getIdentity()->getUsername()) ?></strong><?php if ($currentUser->getIdentity()->getRoleName()): ?> (<?= htmlspecialchars($currentUser->getIdentity()->getRoleName()) ?>)<?php endif; ?>!</p>
        <p>Welcome back, <strong><?= htmlspecialchars($currentUser->getIdentity()->getUsername()) ?></strong><?php if ($currentUser->getIdentity()->getRoleName()): ?> (<?= htmlspecialchars($currentUser->getIdentity()->getRoleName()) ?>)<?php endif; ?>!</p>
        <p>Welcome back, <strong><?= htmlspecialchars($currentUser->getIdentity()->getUsername()) ?></strong><?php if ($currentUser->getIdentity()->getRoleName()): ?> (<?= htmlspecialchars($currentUser->getIdentity()->getRoleName()) ?>)<?php endif; ?>!</p>
        <p>Welcome back, <strong><?= htmlspecialchars($currentUser->getIdentity()->getUsername()) ?></strong><?php if ($currentUser->getIdentity()->getRoleName()): ?> (<?= htmlspecialchars($currentUser->getIdentity()->getRoleName()) ?>)<?php endif; ?>!</p>
        <p>Welcome back, <strong><?= htmlspecialchars($currentUser->getIdentity()->getUsername()) ?></strong><?php if ($currentUser->getIdentity()->getRoleName()): ?> (<?= htmlspecialchars($currentUser->getIdentity()->getRoleName()) ?>)<?php endif; ?>!</p>
        <p>Welcome back, <strong><?= htmlspecialchars($currentUser->getIdentity()->getUsername()) ?></strong><?php if ($currentUser->getIdentity()->getRoleName()): ?> (<?= htmlspecialchars($currentUser->getIdentity()->getRoleName()) ?>)<?php endif; ?>!</p>
        <p>Welcome back, <strong><?= htmlspecialchars($currentUser->getIdentity()->getUsername()) ?></strong><?php if ($currentUser->getIdentity()->getRoleName()): ?> (<?= htmlspecialchars($currentUser->getIdentity()->getRoleName()) ?>)<?php endif; ?>!</p>
        <p>Welcome back, <strong><?= htmlspecialchars($currentUser->getIdentity()->getUsername()) ?></strong><?php if ($currentUser->getIdentity()->getRoleName()): ?> (<?= htmlspecialchars($currentUser->getIdentity()->getRoleName()) ?>)<?php endif; ?>!</p>
        <p>Welcome back, <strong><?= htmlspecialchars($currentUser->getIdentity()->getUsername()) ?></strong><?php if ($currentUser->getIdentity()->getRoleName()): ?> (<?= htmlspecialchars($currentUser->getIdentity()->getRoleName()) ?>)<?php endif; ?>!</p>
        <p>Welcome back, <strong><?= htmlspecialchars($currentUser->getIdentity()->getUsername()) ?></strong><?php if ($currentUser->getIdentity()->getRoleName()): ?> (<?= htmlspecialchars($currentUser->getIdentity()->getRoleName()) ?>)<?php endif; ?>!</p>
        <p>Welcome back, <strong><?= htmlspecialchars($currentUser->getIdentity()->getUsername()) ?></strong><?php if ($currentUser->getIdentity()->getRoleName()): ?> (<?= htmlspecialchars($currentUser->getIdentity()->getRoleName()) ?>)<?php endif; ?>!</p>
        <p>Welcome back, <strong><?= htmlspecialchars($currentUser->getIdentity()->getUsername()) ?></strong><?php if ($currentUser->getIdentity()->getRoleName()): ?> (<?= htmlspecialchars($currentUser->getIdentity()->getRoleName()) ?>)<?php endif; ?>!</p>
        <p>Welcome back, <strong><?= htmlspecialchars($currentUser->getIdentity()->getUsername()) ?></strong><?php if ($currentUser->getIdentity()->getRoleName()): ?> (<?= htmlspecialchars($currentUser->getIdentity()->getRoleName()) ?>)<?php endif; ?>!</p>
        <p>Welcome back, <strong><?= htmlspecialchars($currentUser->getIdentity()->getUsername()) ?></strong><?php if ($currentUser->getIdentity()->getRoleName()): ?> (<?= htmlspecialchars($currentUser->getIdentity()->getRoleName()) ?>)<?php endif; ?>!</p>
        <p>Welcome back, <strong><?= htmlspecialchars($currentUser->getIdentity()->getUsername()) ?></strong><?php if ($currentUser->getIdentity()->getRoleName()): ?> (<?= htmlspecialchars($currentUser->getIdentity()->getRoleName()) ?>)<?php endif; ?>!</p>
        <p>Welcome back, <strong><?= htmlspecialchars($currentUser->getIdentity()->getUsername()) ?></strong><?php if ($currentUser->getIdentity()->getRoleName()): ?> (<?= htmlspecialchars($currentUser->getIdentity()->getRoleName()) ?>)<?php endif; ?>!</p>
        <p>Welcome back, <strong><?= htmlspecialchars($currentUser->getIdentity()->getUsername()) ?></strong><?php if ($currentUser->getIdentity()->getRoleName()): ?> (<?= htmlspecialchars($currentUser->getIdentity()->getRoleName()) ?>)<?php endif; ?>!</p>
        <p>Welcome back, <strong><?= htmlspecialchars($currentUser->getIdentity()->getUsername()) ?></strong><?php if ($currentUser->getIdentity()->getRoleName()): ?> (<?= htmlspecialchars($currentUser->getIdentity()->getRoleName()) ?>)<?php endif; ?>!</p>
        <p>Welcome back, <strong><?= htmlspecialchars($currentUser->getIdentity()->getUsername()) ?></strong><?php if ($currentUser->getIdentity()->getRoleName()): ?> (<?= htmlspecialchars($currentUser->getIdentity()->getRoleName()) ?>)<?php endif; ?>!</p>
        <p>Welcome back, <strong><?= htmlspecialchars($currentUser->getIdentity()->getUsername()) ?></strong><?php if ($currentUser->getIdentity()->getRoleName()): ?> (<?= htmlspecialchars($currentUser->getIdentity()->getRoleName()) ?>)<?php endif; ?>!</p>
        <p>Welcome back, <strong><?= htmlspecialchars($currentUser->getIdentity()->getUsername()) ?></strong><?php if ($currentUser->getIdentity()->getRoleName()): ?> (<?= htmlspecialchars($currentUser->getIdentity()->getRoleName()) ?>)<?php endif; ?>!</p>
    <?php endif; ?>
</div>
