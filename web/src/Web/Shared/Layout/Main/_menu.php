<?php

declare(strict_types=1);

use Yiisoft\Router\UrlGeneratorInterface;
use Yiisoft\Html\Html;

/**
 * @var UrlGeneratorInterface $urlGenerator
 * @var array $menu
 */

// Check if menu exists
if (empty($menu)) {
    return;
}
?>

<nav class="sticky-menu">
    <ul class="sticky-menu__list">
        <?php foreach ($menu as $key => $item): ?>
            <li class="sticky-menu__item">
                <?php if (isset($item['children']) && !empty($item['children'])): ?>
                    <!-- Dropdown Menu -->
                    <button class="sticky-menu__link sticky-menu__dropdown-toggle">
                        <?= Html::encode($item['alias']) ?>
                        <span class="sticky-menu__dropdown-arrow">▼</span>
                    </button>
                    <ul class="sticky-menu__submenu">
                        <?php foreach ($item['children'] as $childKey => $child): ?>
                            <li class="sticky-menu__submenu-item">
                                <a href="<?= Html::encode($urlGenerator->generate($child['url'])) ?>"
                                   class="sticky-menu__submenu-link">
                                    <?= Html::encode($child['alias']) ?>
                                </a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                <?php else: ?>
                    <!-- Regular Menu Item -->
                    <a href="<?= Html::encode($urlGenerator->generate($item['url'])) ?>"
                       class="sticky-menu__link">
                        <?= Html::encode($item['alias']) ?>
                    </a>
                <?php endif; ?>
            </li>
        <?php endforeach; ?>
    </ul>
</nav>
