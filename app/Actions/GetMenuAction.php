<?php

declare(strict_types=1);

namespace App\Actions;

use App\Models\Menu;

class GetMenuAction
{
    /**
     * @param string $menu_name
     * @return Menu
     */
    public function execute(string $menu_name): Menu
    {
        $query = Menu::query();

        return $query->with('menu_items')->where('name', $menu_name)->firstOrFail();
    }
}
