<?php

declare(strict_types=1);

namespace App\Models\Filters;

use App\Models\Post;
use EloquentFilter\ModelFilter;
use Illuminate\Database\Eloquent\Builder;

class PostFilter extends ModelFilter
{
    /**
     * Related Models that have ModelFilters as well as the method on the ModelFilter
     * As [relationMethod => [input_key1, input_key2]].
     *
     * @var array
     */
    public $relations = [];

    /**
     * Filter by title
     *
     * @param string $title
     * @return Builder<Post>|PostFilter
     */
    public function title(string $title): Builder|PostFilter
    {
        return $this->where('title', 'LIKE', "%{$title}%");
    }

    /**
     * Filter by slug
     *
     * @param string $slug
     * @return Builder<Post>|PostFilter
     */
    public function slug(string $slug): Builder|PostFilter
    {
        return $this->where('slug', $slug);
    }
}
