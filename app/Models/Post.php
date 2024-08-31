<?php

declare(strict_types=1);

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use App\Enums\PostStatusEnum;
use Carbon\Carbon;
use Database\Factories\PostFactory;
use EloquentFilter\Filterable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class Post
 *
 * @property int $id
 * @property int $user_id
 * @property int|null $category_id
 * @property string $title
 * @property string $slug
 * @property string $excerpt
 * @property string $content
 * @property string $status
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property User $user
 * @package App\Models
 * @mixin IdeHelperPost
 */
class Post extends Model
{
    use Filterable;

    /**
     * @use HasFactory<PostFactory>
     */
    use HasFactory;

    protected $table = 'posts';

    protected $casts = [
        'user_id' => 'int',
        'category_id' => 'int'
    ];

    protected $fillable = [
        'user_id',
        'category_id',
        'title',
        'slug',
        'excerpt',
        'content',
        'status'
    ];

    /**
     * @return BelongsTo<User, Post>
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * @return BelongsTo<Category, Post>
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    /*** SCOPES ***/
    /**
     * Scope a query to only include published posts.
     *
     * @param Builder<Post> $query
     */
    public function scopePublished(Builder $query): void
    {
        $query->where('status', PostStatusEnum::Published->value);
    }
}
