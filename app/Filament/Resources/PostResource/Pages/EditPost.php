<?php

declare(strict_types=1);

namespace App\Filament\Resources\PostResource\Pages;

use App\Enums\PostStatusEnum;
use App\Filament\Resources\PostResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPost extends EditRecord
{
    protected static string $resource = PostResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    protected function mutateFormDataBeforeSave(array $data): array
    {
        if ($data['status'] === PostStatusEnum::Published->value && ! isset($data['published_at'])) {
            $data['published_at'] = now();
        }

        return $data;
    }
}
