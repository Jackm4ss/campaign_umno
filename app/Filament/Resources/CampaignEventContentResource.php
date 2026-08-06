<?php

declare(strict_types=1);

namespace App\Filament\Resources;

use App\Filament\Resources\CampaignEventContentResource\Pages;
use App\Filament\Resources\CampaignEventContentResource\Widgets\CampaignEventStatsWidget;
use App\Models\CampaignEventContent;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\HtmlString;

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
            Forms\Components\Section::make('Maklumat Asas')
                ->schema([
                    Forms\Components\TextInput::make('title')
                        ->label('Tajuk Acara')
                        ->validationAttribute('Tajuk Acara')
                        ->required()
                        ->maxLength(255),
                    Forms\Components\DatePicker::make('starts_at')
                        ->label('Tarikh Acara')
                        ->validationAttribute('Tarikh Acara')
                        ->helperText('Label tarikh paparan dijana secara automatik (contoh: 15 Ogos 2026).')
                        ->required()
                        ->native(false),
                    Forms\Components\TextInput::make('place')
                        ->label('Lokasi')
                        ->validationAttribute('Lokasi')
                        ->required()
                        ->maxLength(255),
                    Forms\Components\Textarea::make('short_desc')
                        ->label('Penerangan Ringkas')
                        ->validationAttribute('Penerangan Ringkas')
                        ->helperText('Dipaparkan pada senarai acara.')
                        ->required()
                        ->rows(2),
                    Forms\Components\Toggle::make('is_published')
                        ->label('Terbitkan')
                        ->helperText('Matikan untuk sembunyi dari laman awam.')
                        ->default(true),
                ]),

            Forms\Components\Section::make('Gambar')
                ->schema([
                    Forms\Components\Placeholder::make('current_image')
                        ->label('Gambar Semasa')
                        ->visible(fn (?CampaignEventContent $record) => $record !== null
                            && ! $record->hasMedia('banner')
                            && $record->image_path !== null && $record->image_path !== '')
                        ->content(fn (CampaignEventContent $record) => new HtmlString(
                            '<img src="'.e(asset(ltrim((string) $record->image_path, '/'))).'" alt="Gambar semasa" class="max-h-40 rounded-lg border border-gray-200 dark:border-white/10" />'
                        ))
                        ->columnSpanFull(),
                    Forms\Components\SpatieMediaLibraryFileUpload::make('banner')
                        ->label('Gambar Banner')
                        ->helperText('Mana-mana resolusi diterima. Gambar dimampatkan secara automatik.')
                        ->collection('banner')
                        ->image()
                        ->imagePreviewHeight('160')
                        ->imageResizeTargetWidth('2560')
                        ->imageResizeMode('inside')
                        ->imageResizeUpscale(false)
                        ->maxSize(10240)
                        ->columnSpanFull(),
                ]),

            Forms\Components\Section::make('Kandungan')
                ->schema([
                    Forms\Components\RichEditor::make('lead')
                        ->label('Pengenalan')
                        ->validationAttribute('Pengenalan')
                        ->helperText('Penerangan pembuka di bawah tajuk.')
                        ->required()
                        ->columnSpanFull(),
                ]),

        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('banner_preview')
                    ->label('')
                    ->state(fn (CampaignEventContent $record) => $record->getFirstMediaUrl('banner', 'thumb') ?: ($record->image_path ? asset(ltrim($record->image_path, '/')) : asset('assets/event-1.jpg')))
                    ->square()
                    ->width(60)
                    ->height(60),
                Tables\Columns\TextColumn::make('title')->label('Tajuk')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('date_label')->label('Tarikh'),
                Tables\Columns\TextColumn::make('place')->label('Lokasi'),
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
            'index' => Pages\ListCampaignEventContents::route('/'),
            'create' => Pages\CreateCampaignEventContent::route('/create'),
            'edit' => Pages\EditCampaignEventContent::route('/{record}/edit'),
        ];
    }

    public static function getWidgets(): array
    {
        return [
            CampaignEventStatsWidget::class,
        ];
    }
}
