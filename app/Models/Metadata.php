<?php

declare(strict_types=1);

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Database\Factories\MetadataFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

/**
 * Class Metadata
 *
 * @property int $id
 * @property string $metadatable_type
 * @property int $metadatable_id
 * @property string|null $keywords
 * @property string|null $description
 * @package App\Models
 * @mixin IdeHelperMetadata
 */
class Metadata extends Model
{
    /**
     * @use HasFactory<MetadataFactory>
     */
    use HasFactory;

    protected $table = 'metadatas';
    public $timestamps = false;

    protected $casts = [
        'metadatable_id' => 'int'
    ];

    protected $fillable = [
        'metadatable_type',
        'metadatable_id',
        'keywords',
        'description'
    ];

    /**
     * @return MorphTo<Model,Metadata>
     */
    public function metadatable(): MorphTo
    {
        return $this->morphTo();
    }
}
