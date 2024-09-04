<?php

declare(strict_types=1);

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use App\Observers\SettingObserver;
use Carbon\Carbon;
use Database\Factories\SettingFactory;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Setting
 *
 * @property int $id
 * @property string $key
 * @property string|null $value
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @package App\Models
 * @mixin IdeHelperSetting
 */
#[ObservedBy(SettingObserver::class)]
class Setting extends Model
{
    /**
     * @use HasFactory<SettingFactory>
     */
    use HasFactory;

    protected $table = 'settings';

    protected $fillable = [
        'key',
        'value'
    ];
}
