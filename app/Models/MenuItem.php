<?php

declare(strict_types=1);

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Database\Factories\MenuItemFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class MenuItem
 *
 * @property int $id
 * @property int $menu_id
 * @property string $name
 * @property string $url
 * @property int $order
 *
 * @property Menu $menu
 *
 * @package App\Models
 */
class MenuItem extends Model
{
    /**
     * @use HasFactory<MenuItemFactory>
     */
    use HasFactory;

    protected $table = 'menu_items';
    public $timestamps = false;

    protected $casts = [
        'menu_id' => 'int',
        'order' => 'int'
    ];

    protected $fillable = [
        'menu_id',
        'name',
        'url',
        'order'
    ];

    /**
     * @return BelongsTo<Menu,MenuItem>
     */
    public function menu(): BelongsTo
    {
        return $this->belongsTo(Menu::class);
    }
}
