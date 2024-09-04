<?php

declare(strict_types=1);

namespace App\Actions;

use App\Models\Setting;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Cache;

class GetSettingsAction
{
    /**
     * @param string|null $key
     * @return Setting|Collection<int,Setting>|null
     */
    public function execute(?string $key = null): Setting|Collection|null
    {
        $query = Setting::query();

        if ($key) {
            /** @var Setting|null $setting */
            $setting = Cache::remember('settings-'.$key, now()->addHours(48), fn () => $query->where('key', $key)->first());

            return $setting;
        }

        /** @var Collection<int,Setting> $settings */
        $settings = Cache::remember('settings', now()->addHours(48), fn () => $query->get());

        return $settings;
    }
}
