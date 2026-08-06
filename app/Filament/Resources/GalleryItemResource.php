<?php

declare(strict_types=1);

namespace App\Filament\Resources;

use App\Enums\GalleryType;
use App\Filament\Resources\GalleryItemResource\Pages;
use App\Filament\Resources\GalleryItemResource\Widgets\GalleryStatsWidget;
use App\Models\GalleryItem;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\HtmlString;

final class GalleryItemResource extends Resource
{
    protected static ?string $model = GalleryItem::class;

    protected static ?string $navigationIcon = 'heroicon-o-photo';

    protected static ?string $navigationGroup = 'Content';

    protected static ?string $modelLabel = 'Gallery Item';

    protected static ?string $pluralModelLabel = 'Gallery';

    protected static ?int $navigationSort = 3;

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Section::make('Maklumat Asas')
                ->schema([
                    Forms\Components\TextInput::make('title')
                        ->label('Tajuk')
                        ->validationAttribute('Tajuk')
                        ->required()
                        ->maxLength(255),
                    Forms\Components\Select::make('type')
                        ->label('Jenis')
                        ->validationAttribute('Jenis')
                        ->helperText('Pilih "Foto" untuk gambar biasa.')
                        ->options(fn () => collect(GalleryType::cases())
                            ->mapWithKeys(fn (GalleryType $type) => [$type->value => $type->label()])
                            ->all())
                        ->required()
                        ->default(GalleryType::Photo),
                    Forms\Components\TextInput::make('external_url')
                        ->label('Pautan Video (YouTube/TikTok)')
                        ->helperText('Isi hanya jika jenis bukan foto.')
                        ->url()
                        ->maxLength(255)
                        ->visible(fn (Forms\Get $get) => $get('type') !== GalleryType::Photo->value),
                    Forms\Components\Toggle::make('is_published')
                        ->label('Terbitkan')
                        ->helperText('Matikan untuk sembunyi dari laman awam.')
                        ->default(true),
                ]),

            Forms\Components\Section::make('Gambar')
                ->schema([
                    Forms\Components\Placeholder::make('current_image')
                        ->label('Gambar Semasa')
                        ->visible(fn (?GalleryItem $record) => $record !== null
                            && ! $record->hasMedia('image')
                            && $record->image_path !== null && $record->image_path !== '')
                        ->content(fn (GalleryItem $record) => new HtmlString(
                            '<img src="'.e(asset(ltrim((string) $record->image_path, '/'))).'" alt="Gambar semasa" class="max-h-40 rounded-lg border border-gray-200 dark:border-white/10" />'
                        ))
                        ->columnSpanFull(),
                    Forms\Components\SpatieMediaLibraryFileUpload::make('image')
                        ->label('Gambar')
                        ->helperText('Mana-mana resolusi diterima. Gambar dimampatkan secara automatik.')
                        ->collection('image')
                        ->image()
                        ->imagePreviewHeight('160')
                        ->imageResizeTargetWidth('2560')
                        ->imageResizeMode('inside')
                        ->imageResizeUpscale(false)
                        ->maxSize(10240)
                        ->columnSpanFull(),
                ]),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('image_preview')
                    ->label('')
                    ->state(fn (GalleryItem $record) => $record->getFirstMediaUrl('image', 'thumb') ?: ($record->image_path ? asset(ltrim($record->image_path, '/')) : asset('assets/event-1.jpg')))
                    ->square()
                    ->width(60)
                    ->height(60),
                Tables\Columns\TextColumn::make('title')->label('Tajuk')->searchable()->limit(40),
                Tables\Columns\TextColumn::make('type')
                    ->label('Jenis')
                    ->badge()
                    ->formatStateUsing(fn (GalleryType $state) => $state->label()),
                Tables\Columns\TextColumn::make('sort_order')->label('Susunan')->sortable(),
                Tables\Columns\IconColumn::make('is_published')->label('Terbit')->boolean(),
            ])
            ->reorderable('sort_order')
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->defaultSort('sort_order');
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListGalleryItems::route('/'),
            'create' => Pages\CreateGalleryItem::route('/create'),
            'edit' => Pages\EditGalleryItem::route('/{record}/edit'),
        ];
    }

    public static function getWidgets(): array
    {
        return [
            GalleryStatsWidget::class,
        ];
    }
}
