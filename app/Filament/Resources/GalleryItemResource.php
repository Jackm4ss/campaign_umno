<?php

declare(strict_types=1);

namespace App\Filament\Resources;

use App\Enums\GalleryType;
use App\Filament\Resources\GalleryItemResource\Pages;
use App\Models\GalleryItem;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

final class GalleryItemResource extends Resource
{
    protected static ?string $model = GalleryItem::class;
    protected static ?string $navigationIcon = 'heroicon-o-photo';
    protected static ?string $navigationGroup = 'Kandungan';
    protected static ?string $modelLabel = 'Galeri';
    protected static ?string $pluralModelLabel = 'Galeri';
    protected static ?int $navigationSort = 4;

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Section::make('Item Galeri')->schema([
                Forms\Components\TextInput::make('title')->label('Tajuk')->required()->maxLength(255),
                Forms\Components\Select::make('type')->label('Jenis')->options(GalleryType::class)->required()->default(GalleryType::Photo),
                Forms\Components\TextInput::make('external_url')->label('URL Luaran (YouTube/TikTok)')->url()->maxLength(255),
                Forms\Components\TextInput::make('sort_order')->label('Urutan')->numeric()->default(0),
                Forms\Components\Toggle::make('is_published')->label('Diterbitkan')->default(true),
                Forms\Components\SpatieMediaLibraryFileUpload::make('image')
                    ->label('Gambar')
                    ->collection('image')
                    ->image()
                    ->maxSize(5120)
                    ->columnSpanFull(),
            ])->columns(2),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\SpatieMediaLibraryImageColumn::make('image')->collection('image')->label('')->square(),
                Tables\Columns\TextColumn::make('title')->label('Tajuk')->searchable()->limit(40),
                Tables\Columns\TextColumn::make('type')->label('Jenis')->badge(),
                Tables\Columns\TextColumn::make('sort_order')->label('Urutan')->sortable(),
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
}
