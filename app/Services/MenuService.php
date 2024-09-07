<?php

declare(strict_types=1);

namespace App\Services;

use App\Actions\GetMenuAction;
use Exception;
use Illuminate\Support\Facades\Log;
use Throwable;

class MenuService
{
    /**
     * @param string $menu_name
     * @return array
     */
    public function get(string $menu_name): array
    {
        try {
            $menu = app(GetMenuAction::class)->execute($menu_name);
        } catch (Exception|Throwable $e) {
            Log::channel('custom')->error($e->getMessage());
            Log::channel('custom')->error($e->getTraceAsString());

            return [];
        }

        return $menu->menu_items->sortBy('order')->toArray();
    }
}
