<?php

declare(strict_types=1);

namespace App\Filament\Resources;

use App\Filament\Resources\AspirationResource\Pages;
use App\Models\Aspiration;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

final class AspirationResource extends Resource
{
    protected static ?string $model = Aspiration::class;
    protected static ?string $navigationIcon = 'heroicon-o-chat-bubble-left-right';
    protected static ?string $navigationGroup = 'Pendaftaran';
    protected static ?string $modelLabel = 'Aspirasi';
    protected static ?string $pluralModelLabel = 'Aspirasi';
    protected static ?int $navigationSort = 3;

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Section::make('Maklumat Aspirasi')->schema([
                Forms\Components\TextInput::make('name')->label('Nama')->disabled(),
                Forms\Components\TextInput::make('identity_number')->label('No. KP')->disabled(),
                Forms\Components\TextInput::make('email')->label('E-mel')->disabled(),
                Forms\Components\TextInput::make('phone')->label('Telefon')->disabled(),
                Forms\Components\Textarea::make('message')->label('Mesej')->disabled()->columnSpanFull(),
            ])->columns(2),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')->label('Nama')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('email')->label('E-mel')->searchable(),
                Tables\Columns\TextColumn::make('phone')->label('Telefon'),
                Tables\Columns\TextColumn::make('message')->label('Mesej')->limit(50),
                Tables\Columns\TextColumn::make('created_at')->label('Tarikh')->dateTime('d M Y H:i')->sortable(),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->defaultSort('created_at', 'desc');
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListAspirations::route('/'),
        ];
    }

    public static function canCreate(): bool
    {
        return false;
    }
}
