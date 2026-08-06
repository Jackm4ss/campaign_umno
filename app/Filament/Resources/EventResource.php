<?php

declare(strict_types=1);

namespace App\Filament\Resources;

use App\Enums\EventStatus;
use App\Filament\Resources\EventResource\Pages;
use App\Models\Event;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

final class EventResource extends Resource
{
    protected static ?string $model = Event::class;
    protected static ?string $navigationIcon = 'heroicon-o-calendar-days';
    protected static ?string $navigationGroup = 'Kandungan';
    protected static ?string $modelLabel = 'Acara';
    protected static ?string $pluralModelLabel = 'Acara';
    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Section::make('Maklumat Acara')->schema([
                Forms\Components\TextInput::make('title')
                    ->label('Tajuk')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('slug')
                    ->label('Slug')
                    ->required()
                    ->unique(ignoreRecord: true)
                    ->maxLength(255),
                Forms\Components\Select::make('event_category_id')
                    ->label('Kategori')
                    ->relationship('category', 'name')
                    ->searchable()
                    ->preload()
                    ->createOptionForm([
                        Forms\Components\TextInput::make('name')->required(),
                        Forms\Components\TextInput::make('slug')->required(),
                    ]),
                Forms\Components\Select::make('status')
                    ->label('Status')
                    ->options(EventStatus::class)
                    ->required()
                    ->default(EventStatus::Upcoming),
                Forms\Components\DateTimePicker::make('starts_at')
                    ->label('Tarikh Mula')
                    ->required(),
                Forms\Components\TextInput::make('venue_name')
                    ->label('Nama Tempat')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Textarea::make('address')
                    ->label('Alamat')
                    ->required(),
                Forms\Components\RichEditor::make('description')
                    ->label('Keterangan')
                    ->required()
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('banner_image')
                    ->label('Imej Banner (path)')
                    ->maxLength(255),
                Forms\Components\TextInput::make('map_url')
                    ->label('URL Peta')
                    ->url()
                    ->maxLength(255),
            ])->columns(2),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->label('Tajuk')
                    ->searchable()
                    ->limit(40),
                Tables\Columns\TextColumn::make('category.name')
                    ->label('Kategori')
                    ->badge(),
                Tables\Columns\TextColumn::make('status')
                    ->label('Status')
                    ->badge()
                    ->color(fn (EventStatus $state): string => match ($state) {
                        EventStatus::Ongoing => 'success',
                        EventStatus::Upcoming => 'info',
                        EventStatus::Past => 'gray',
                    }),
                Tables\Columns\TextColumn::make('starts_at')
                    ->label('Tarikh')
                    ->dateTime('d M Y H:i')
                    ->sortable(),
                Tables\Columns\TextColumn::make('venue_name')
                    ->label('Tempat')
                    ->limit(30),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('status')
                    ->options(EventStatus::class),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->defaultSort('starts_at', 'desc');
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListEvents::route('/'),
            'create' => Pages\CreateEvent::route('/create'),
            'edit' => Pages\EditEvent::route('/{record}/edit'),
        ];
    }
}
