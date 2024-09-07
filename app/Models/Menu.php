<?php

declare(strict_types=1);

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Database\Factories\MenuFactory;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Class Menu
 *
 * @property int $id
 * @property string $name
 *
 * @property Collection|MenuItem[] $menu_items
 *
 * @package App\Models
 */
class Menu extends Model
{
    /**
     * @use HasFactory<MenuFactory>
     */
    use HasFactory;

    protected $table = 'menus';
    public $timestamps = false;

    protected $fillable = [
        'name'
    ];

    /**
     * @return HasMany<MenuItem>
     */
    public function menu_items(): HasMany
    {
        return $this->hasMany(MenuItem::class);
    }
}
