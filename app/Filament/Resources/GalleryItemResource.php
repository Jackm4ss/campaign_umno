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
                        ->helperText('Pilih jenis kandungan galeri.')
                        ->placeholder('Sila pilih jenis kandungan')
                        ->options(fn () => collect(GalleryType::cases())
                            ->mapWithKeys(fn (GalleryType $type) => [$type->value => $type->label()])
                            ->all())
                        ->required()
                        ->live(),
                    Forms\Components\TextInput::make('external_url')
                        ->label('Pautan Video')
                        ->helperText('Masukkan URL penuh dari YouTube, TikTok, Instagram atau Facebook.')
                        ->url()
                        ->maxLength(255)
                        ->visible(fn (Forms\Get $get): bool => $get('type') !== null && $get('type') !== GalleryType::Photo->value)
                        ->required(fn (Forms\Get $get): bool => $get('type') !== null && $get('type') !== GalleryType::Photo->value),
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
                        ->label(fn (Forms\Get $get): string => $get('type') !== null && $get('type') !== GalleryType::Photo->value
                            ? 'Gambar Thumbnail'
                            : 'Gambar')
                        ->helperText(fn (Forms\Get $get): string => $get('type') !== null && $get('type') !== GalleryType::Photo->value
                            ? 'Opsional. Jika tidak dimuat naik, paparan lalai ikon play akan digunakan.'
                            : 'Wajib. Mana-mana resolusi diterima. Gambar dimampatkan secara automatik.')
                        ->required(fn (Forms\Get $get): bool => $get('type') === null || $get('type') === GalleryType::Photo->value)
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
                    ->state(function (GalleryItem $record): string {
                        $media = $record->getFirstMediaUrl('image', 'thumb');
                        if ($media !== '') {
                            return $media;
                        }
                        if ($record->image_path) {
                            return asset(ltrim($record->image_path, '/'));
                        }
                        if ($record->type === GalleryType::Photo) {
                            return asset('assets/event-1.jpg');
                        }

                        return 'data:image/svg+xml,' . rawurlencode(
                            '<svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" viewBox="0 0 60 60">'
                            . '<rect width="60" height="60" rx="8" fill="#1a1a2e"/>'
                            . '<circle cx="30" cy="30" r="18" fill="rgba(0,0,0,0.45)" stroke="#fff" stroke-width="1.5"/>'
                            . '<polygon points="25,20 25,40 42,30" fill="#fff"/>'
                            . '</svg>'
                        );
                    })
                    ->square()
                    ->width(60)
                    ->height(60),
                Tables\Columns\TextColumn::make('title')->label('Tajuk')->searchable()->limit(40),
                Tables\Columns\TextColumn::make('type')
                    ->label('Jenis')
                    ->badge()
                    ->formatStateUsing(fn (GalleryType $state) => $state->label()),
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
