<?php

declare(strict_types=1);

namespace App\Enums;

use Filament\Support\Contracts\HasColor;
use Filament\Support\Contracts\HasDescription;
use Filament\Support\Contracts\HasIcon;
use Filament\Support\Contracts\HasLabel;

enum PostStatusEnum: string implements HasLabel, HasDescription, HasColor, HasIcon
{
    case Draft = 'draft';
    case Reviewing = 'reviewing';
    case Published = 'published';
    case Rejected = 'rejected';
    case Scheduled = 'scheduled';

    public function getLabel(): ?string
    {
        return match ($this) {
            self::Draft => __('Draft'),
            self::Reviewing => __('Reviewing'),
            self::Published => __('Published'),
            self::Rejected => __('Rejected'),
            self::Scheduled => __('Scheduled'),
        };
    }

    public function getColor(): string | array | null
    {
        return match ($this) {
            self::Draft => 'gray',
            self::Reviewing => 'warning',
            self::Published => 'success',
            self::Rejected => 'danger',
            self::Scheduled => 'info',
        };
    }

    public function getIcon(): ?string
    {
        return match ($this) {
            self::Draft => 'heroicon-m-pencil',
            self::Reviewing => 'heroicon-m-eye',
            self::Published => 'heroicon-m-check',
            self::Rejected => 'heroicon-m-x-mark',
            self::Scheduled => 'heroicon-m-clock',
        };
    }

    public function getDescription(): ?string
    {
        return match ($this) {
            self::Draft => __('This has not finished being written yet.'),
            self::Reviewing => __('This is ready for a staff member to read.'),
            self::Published => __('This has been approved by a staff member and is public on the website.'),
            self::Rejected => __('A staff member has decided this is not appropriate for the website.'),
            self::Scheduled => __('This will be published at a later date.'),
        };
    }
}
