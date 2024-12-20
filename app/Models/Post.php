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
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Laravel\Scout\Searchable;

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
 * @property Carbon|null $publish_on
 * @property Carbon|null $published_at
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

    use Searchable;

    protected $table = 'posts';

    protected $casts = [
        'user_id' => 'int',
        'category_id' => 'int',
        'status' => PostStatusEnum::class,
        'publish_on' => 'datetime',
        'published_at' => 'datetime',
    ];

    protected $fillable = [
        'user_id',
        'category_id',
        'title',
        'slug',
        'excerpt',
        'content',
        'status',
        'publish_on',
        'published_at',
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

    /**
     * @return MorphOne<Metadata>
     */
    public function metadata(): MorphOne
    {
        return $this->morphOne(Metadata::class, 'metadatable');
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
