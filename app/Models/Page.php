<?php

declare(strict_types=1);

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use App\Enums\PageStatusEnum;
use App\Observers\PageObserver;
use Carbon\Carbon;
use Database\Factories\PageFactory;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphOne;

/**
 * Class Page
 *
 * @property int $id
 * @property string $title
 * @property string $slug
 * @property string $content
 * @property string $status
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @package App\Models
 * @mixin IdeHelperPage
 */

#[ObservedBy([PageObserver::class])]
class Page extends Model
{
    /**
     * @use HasFactory<PageFactory>
     */
    use HasFactory;

    protected $table = 'pages';

    protected $fillable = [
        'title',
        'slug',
        'content',
        'status'
    ];

    protected $casts = [
        'status' => PageStatusEnum::class,
    ];

    /**
     * @return MorphOne<Metadata>
     */
    public function metadata(): MorphOne
    {
        return $this->morphOne(Metadata::class, 'metadatable');
    }
}
