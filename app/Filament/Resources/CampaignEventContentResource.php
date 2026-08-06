<?php

declare(strict_types=1);

namespace App\Filament\Resources;

use App\Filament\Resources\CampaignEventContentResource\Pages;
use App\Models\CampaignEventContent;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

final class CampaignEventContentResource extends Resource
{
    protected static ?string $model = CampaignEventContent::class;
    protected static ?string $navigationIcon = 'heroicon-o-megaphone';
    protected static ?string $navigationGroup = 'Kandungan';
    protected static ?string $modelLabel = 'Kandungan Acara';
    protected static ?string $pluralModelLabel = 'Kandungan Acara';
    protected static ?int $navigationSort = 6;

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Section::make('Maklumat Acara Kempen')->schema([
                Forms\Components\TextInput::make('title')->label('Tajuk')->required()->maxLength(255),
                Forms\Components\TextInput::make('slug')->label('Slug')->required()->unique(ignoreRecord: true)->maxLength(255),
                Forms\Components\TextInput::make('date_label')->label('Label Tarikh')->required()->maxLength(255),
                Forms\Components\TextInput::make('place')->label('Tempat')->required()->maxLength(255),
                Forms\Components\Textarea::make('short_desc')->label('Penerangan Ringkas')->required(),
                Forms\Components\TextInput::make('sort_order')->label('Urutan')->numeric()->default(0),
                Forms\Components\Toggle::make('is_published')->label('Diterbitkan')->default(true),
                Forms\Components\SpatieMediaLibraryFileUpload::make('banner')
                    ->label('Gambar Banner')
                    ->collection('banner')
                    ->image()
                    ->imageResizeMode('cover')
                    ->imageCropAspectRatio('16:9')
                    ->maxSize(5120)
                    ->columnSpanFull(),
                Forms\Components\RichEditor::make('lead')->label('Pengenalan')->required()->columnSpanFull(),
                Forms\Components\KeyValue::make('cta')->label('CTA Buttons')->columnSpanFull(),
            ])->columns(2),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\SpatieMediaLibraryImageColumn::make('banner')->collection('banner')->label('')->square(),
                Tables\Columns\TextColumn::make('title')->label('Tajuk')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('date_label')->label('Tarikh'),
                Tables\Columns\TextColumn::make('place')->label('Tempat'),
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
            'index' => Pages\ListCampaignEventContents::route('/'),
            'create' => Pages\CreateCampaignEventContent::route('/create'),
            'edit' => Pages\EditCampaignEventContent::route('/{record}/edit'),
        ];
    }
}
