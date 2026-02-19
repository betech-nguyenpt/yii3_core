<?php

declare(strict_types=1);

namespace App\Web\Shared;

final readonly class MenuProvider
{
    public function __construct(private array $menuConfig) {}

    /**
     * Get the menu data
     * 
     * @return array Menu configuration
     */
    public function getMenu(): array
    {
        return $this->menuConfig['back_menu'] ?? [];
    }
}
