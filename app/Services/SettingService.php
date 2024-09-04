<?php

declare(strict_types=1);

namespace App\Services;

use App\Actions\GetSettingsAction;
use App\Models\Setting;
use Illuminate\Database\Eloquent\Collection;

class SettingService
{
    public function get(string $key): ?string
    {
        /** @var Setting|null $setting */
        $setting = app(GetSettingsAction::class)->execute($key);

        return $setting?->value;
    }

    /**
     * @return Collection<int,Setting>
     */
    public function all(): Collection
    {
        /** @var Collection<int,Setting> $settings */
        $settings = app(GetSettingsAction::class)->execute();

        return $settings;
    }
}
