<?php

declare(strict_types=1);

namespace App\Actions;

use App\Models\Post;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;

class ListPublishedPostsAction
{
    /**
     * Retrieve a list of posts
     *
     * @param array $with
     * @param array $filters
     * @param array $orders
     * @param bool $paginate
     * @param int|null $per_page
     * @param int|null $limit
     * @return Collection<int,Post>|LengthAwarePaginator<Post>
     */
    public function execute(array $with = [], array $filters = [], array $orders = [], bool $paginate = true, ?int $per_page = 10, ?int $limit = null): Collection|LengthAwarePaginator
    {
        $query = Post::query();

        $query->scopes(['published']);

        if ( ! empty($with)) {
            $query->with($with);
        }

        if ( ! empty($filters)) {
            $query->filter($filters);
        }

        if ( ! empty($orders)) {
            foreach ($orders as $column => $direction) {
                $query->orderBy($column, $direction);
            }
        }

        if ($paginate) {
            return $query->paginate($per_page);
        } else {
            if ($limit) {
                return $query->limit($limit)->get();
            } else {
                return $query->get();
            }
        }
    }
}
