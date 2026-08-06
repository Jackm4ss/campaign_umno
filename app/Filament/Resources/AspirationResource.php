<?php

declare(strict_types=1);

namespace App\Filament\Resources;

use App\Filament\Resources\AspirationResource\Pages;
use App\Models\Aspiration;
use App\Support\SubmissionSources;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Infolists;
use Filament\Infolists\Infolist;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

final class AspirationResource extends Resource
{
    protected static ?string $model = Aspiration::class;

    protected static ?string $navigationIcon = 'heroicon-o-chat-bubble-left-right';

    protected static ?string $navigationGroup = 'Submissions';

    protected static ?string $modelLabel = 'Aspiration';

    protected static ?string $pluralModelLabel = 'Aspirations';

    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Section::make('Aspiration Details')->schema([
                Forms\Components\TextInput::make('name')->label('Name')->disabled(),
                Forms\Components\TextInput::make('identity_number')->label('IC Number')->disabled(),
                Forms\Components\TextInput::make('email')->label('Email')->disabled(),
                Forms\Components\TextInput::make('phone')->label('Phone')->disabled(),
                Forms\Components\Textarea::make('message')->label('Message')->disabled()->columnSpanFull(),
            ])->columns(2),
        ]);
    }

    public static function infolist(Infolist $infolist): Infolist
    {
        return $infolist->schema([
            Infolists\Components\Section::make('Aspiration Details')
                ->schema([
                    Infolists\Components\ViewEntry::make('name')
                        ->label('Name')
                        ->view('filament.tables.columns.initials-avatar'),
                    Infolists\Components\TextEntry::make('identity_number')->label('IC Number'),
                    Infolists\Components\TextEntry::make('email')->label('Email'),
                    Infolists\Components\TextEntry::make('phone')->label('Phone'),
                    Infolists\Components\TextEntry::make('message')->label('Message')->columnSpanFull(),
                    Infolists\Components\TextEntry::make('source')
                        ->label('Platform')
                        ->badge()
                        ->formatStateUsing(fn (?string $state) => SubmissionSources::label($state ?: 'direct')),
                    Infolists\Components\TextEntry::make('created_at')->label('Submitted')->dateTime('d M Y H:i'),
                ])
                ->columns(2),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ViewColumn::make('name')
                    ->label('Name')
                    ->view('filament.tables.columns.initials-avatar')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('email')->label('Email')->searchable(),
                Tables\Columns\TextColumn::make('phone')->label('Phone'),
                Tables\Columns\TextColumn::make('message')->label('Message')->limit(50),
                Tables\Columns\TextColumn::make('source')
                    ->label('Platform')
                    ->badge()
                    ->formatStateUsing(fn (?string $state) => SubmissionSources::label($state ?: 'direct')),
                Tables\Columns\TextColumn::make('created_at')->label('Submitted')->dateTime('d M Y H:i')->sortable(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('source')
                    ->label('Platform')
                    ->options(SubmissionSources::labels()),
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
