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
    protected static ?string $navigationGroup = 'Content';
    protected static ?string $modelLabel = 'Campaign Event';
    protected static ?string $pluralModelLabel = 'Campaign Events';
    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Section::make('Campaign Event Details')->schema([
                Forms\Components\TextInput::make('title')->label('Title')->required()->maxLength(255),
                Forms\Components\TextInput::make('slug')->label('Slug')->required()->unique(ignoreRecord: true)->maxLength(255),
                Forms\Components\TextInput::make('date_label')->label('Date Label')->required()->maxLength(255),
                Forms\Components\TextInput::make('place')->label('Venue')->required()->maxLength(255),
                Forms\Components\Textarea::make('short_desc')->label('Short Description')->required(),
                Forms\Components\TextInput::make('sort_order')->label('Sort Order')->numeric()->default(0),
                Forms\Components\Toggle::make('is_published')->label('Published')->default(true),
                Forms\Components\SpatieMediaLibraryFileUpload::make('banner')
                    ->label('Banner Image')
                    ->collection('banner')
                    ->image()
                    ->imageResizeMode('cover')
                    ->imageCropAspectRatio('16:9')
                    ->maxSize(5120)
                    ->columnSpanFull(),
                Forms\Components\RichEditor::make('lead')->label('Introduction')->required()->columnSpanFull(),
                Forms\Components\Repeater::make('sections')
                    ->label('Content Sections')
                    ->schema([
                        Forms\Components\TextInput::make('heading')->label('Heading')->required()->maxLength(255),
                        Forms\Components\TagsInput::make('paragraphs')->label('Paragraphs')->columnSpanFull(),
                        Forms\Components\TagsInput::make('bullets')->label('Bullet Points')->columnSpanFull(),
                    ])
                    ->reorderable()
                    ->collapsible()
                    ->columnSpanFull(),
                Forms\Components\KeyValue::make('cta')->label('CTA Buttons')->columnSpanFull(),
            ])->columns(2),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\SpatieMediaLibraryImageColumn::make('banner')->collection('banner')->label('')->square(),
                Tables\Columns\TextColumn::make('title')->label('Title')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('date_label')->label('Date'),
                Tables\Columns\TextColumn::make('place')->label('Venue'),
                Tables\Columns\TextColumn::make('sort_order')->label('Order')->sortable(),
                Tables\Columns\IconColumn::make('is_published')->label('Published')->boolean(),
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
