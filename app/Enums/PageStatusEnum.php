<?php

declare(strict_types=1);

namespace App\Enums;

use Filament\Support\Contracts\HasColor;
use Filament\Support\Contracts\HasDescription;
use Filament\Support\Contracts\HasIcon;
use Filament\Support\Contracts\HasLabel;

enum PageStatusEnum: string implements HasLabel, HasDescription, HasColor, HasIcon
{
    case Draft = 'draft';
    case Published = 'published';

    public function getLabel(): ?string
    {
        return match ($this) {
            self::Draft => __('Draft'),
            self::Published => __('Published'),
        };
    }

    public function getColor(): string | array | null
    {
        return match ($this) {
            self::Draft => 'gray',
            self::Published => 'success',
        };
    }

    public function getIcon(): ?string
    {
        return match ($this) {
            self::Draft => 'heroicon-m-pencil',
            self::Published => 'heroicon-m-check',
        };
    }

    public function getDescription(): ?string
    {
        return match ($this) {
            self::Draft => __('This has not finished being written yet.'),
            self::Published => __('This has been approved by a staff member and is public on the website.'),
        };
    }
}
