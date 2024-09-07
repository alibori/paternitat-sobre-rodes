<?php

declare(strict_types=1);

namespace App\Facades;

use App\Services\MenuService;
use Illuminate\Support\Facades\Facade;

class Menu extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return MenuService::class;
    }
}
