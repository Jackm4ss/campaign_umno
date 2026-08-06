<?php

declare(strict_types=1);

namespace App\Filament\Resources;

use App\Filament\Resources\EventRegistrationResource\Pages;
use App\Models\EventRegistration;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

final class EventRegistrationResource extends Resource
{
    protected static ?string $model = EventRegistration::class;
    protected static ?string $navigationIcon = 'heroicon-o-ticket';
    protected static ?string $navigationGroup = 'Pendaftaran';
    protected static ?string $modelLabel = 'Pendaftaran Acara';
    protected static ?string $pluralModelLabel = 'Pendaftaran Acara';
    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Section::make('Maklumat Pendaftaran')->schema([
                Forms\Components\Select::make('event_id')->label('Acara')->relationship('event', 'title')->required()->searchable()->preload(),
                Forms\Components\TextInput::make('identity_number')->label('No. KP')->required(),
                Forms\Components\TextInput::make('email')->label('E-mel')->email()->required(),
                Forms\Components\TextInput::make('qr_token')->label('Token QR')->disabled(),
                Forms\Components\DateTimePicker::make('checked_in_at')->label('Daftar Masuk'),
            ])->columns(2),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('event.title')->label('Acara')->searchable()->limit(30),
                Tables\Columns\TextColumn::make('identity_number')->label('No. KP')->searchable(),
                Tables\Columns\TextColumn::make('email')->label('E-mel')->searchable(),
                Tables\Columns\TextColumn::make('qr_token')->label('QR')->limit(12)->copyable(),
                Tables\Columns\TextColumn::make('checked_in_at')->label('Daftar Masuk')->dateTime('d M Y H:i'),
                Tables\Columns\TextColumn::make('created_at')->label('Tarikh')->dateTime('d M Y')->sortable(),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
            ])
            ->defaultSort('created_at', 'desc');
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListEventRegistrations::route('/'),
        ];
    }

    public static function canCreate(): bool
    {
        return false;
    }
}
