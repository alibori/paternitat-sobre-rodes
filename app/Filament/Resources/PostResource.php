<?php

declare(strict_types=1);

namespace App\Filament\Resources;

use App\Enums\PostStatusEnum;
use App\Filament\Resources\PostResource\Pages;
use App\Models\Post;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Str;

class PostResource extends Resource
{
    protected static ?string $model = Post::class;

    protected static ?string $navigationGroup = 'Blog';

    public static function getModelLabel(): string
    {
        return __('Post');
    }

    public static function getPluralModelLabel(): string
    {
        return __('Posts');
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('user_id')
                    ->label(__('Author'))
                    ->relationship('user', 'name')
                    ->default(auth()->id())
                    ->required(),
                Forms\Components\Select::make('category_id')
                    ->label(__('Category'))
                    ->relationship('category', 'name')
                    ->nullable(),
                Forms\Components\TextInput::make('title')
                    ->label(__('Title'))
                    ->afterStateUpdated(function (Forms\Get $get, Forms\Set $set, ?string $state): void {
                        if ( ! $get('is_slug_changed_manually') && filled($state)) {
                            $set('slug', Str::slug($state));
                        }
                    })
                    ->reactive()
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('slug')
                    ->label(__('Slug'))
                    ->afterStateUpdated(function (Forms\Set $set): void {
                        $set('is_slug_changed_manually', true);
                    })
                    ->required()
                    ->maxLength(255)
                    ->helperText(__('By default, the slug will be generated automatically from the title. If you change it, make sure it is unique.')),
                Forms\Components\Textarea::make('excerpt')
                    ->label(__('Excerpt'))
                    ->columnSpanFull(),
                Forms\Components\Fieldset::make('Metadata')
                    ->label(__('Metadata'))
                    ->relationship('metadata')
                    ->schema([
                        Forms\Components\TextInput::make('keywords')
                            ->label(__('Keywords'))
                            ->nullable()
                            ->helperText(__('Comma-separated list of keywords'))
                            ->columnSpanFull(),
                        Forms\Components\Textarea::make('description')
                            ->label(__('Description'))
                            ->nullable()
                            ->columnSpanFull(),
                    ]),
                Forms\Components\RichEditor::make('content')
                    ->label(__('Content'))
                    ->required()
                    ->columnSpanFull(),
                Forms\Components\Select::make('status')
                    ->label(__('Status'))
                    ->options(PostStatusEnum::class)
                    ->default(PostStatusEnum::Draft)
                    ->required(),
                Forms\Components\DatePicker::make('publish_on')
                    ->label(__('Publish on'))
                    ->nullable()
                    ->hidden(fn (Forms\Get $get): bool => $get('status') !== PostStatusEnum::Scheduled->value),
                Forms\Components\DatePicker::make('published_at')
                    ->label(__('Published at'))
                    ->nullable(),
                Forms\Components\Hidden::make('is_slug_changed_manually')
                    ->default(false)
                    ->dehydrated(false),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('user.name')
                    ->label(__('Author'))
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('category.name')
                    ->label(__('Category'))
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('title')
                    ->label(__('Title'))
                    ->searchable(),
                Tables\Columns\TextColumn::make('slug')
                    ->label(__('Slug'))
                    ->searchable(),
                Tables\Columns\TextColumn::make('status')
                    ->label(__('Status'))
                    ->badge()
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('status')
                    ->options(PostStatusEnum::class)
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [

        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPosts::route('/'),
            'create' => Pages\CreatePost::route('/create'),
            'edit' => Pages\EditPost::route('/{record}/edit'),
        ];
    }
}
