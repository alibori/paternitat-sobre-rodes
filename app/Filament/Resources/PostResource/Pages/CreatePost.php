<?php

declare(strict_types=1);

namespace App\Filament\Resources\PostResource\Pages;

use App\Enums\PostStatusEnum;
use App\Filament\Resources\PostResource;
use Filament\Resources\Pages\CreateRecord;

class CreatePost extends CreateRecord
{
    protected static string $resource = PostResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        if ($data['status'] === PostStatusEnum::Published->value && ! isset($data['published_at'])) {
            $data['published_at'] = now();
        }

        return $data;
    }
}
