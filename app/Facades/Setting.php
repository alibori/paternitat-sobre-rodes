<?php

declare(strict_types=1);

namespace App\Facades;

use App\Services\SettingService;
use Illuminate\Support\Facades\Facade;

class Setting extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return SettingService::class;
    }
}
