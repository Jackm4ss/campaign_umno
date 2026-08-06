<?php

declare(strict_types=1);

namespace App\Filament\Resources;

use App\Filament\Resources\LeaderResource\Pages;
use App\Models\Leader;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

final class LeaderResource extends Resource
{
    protected static ?string $model = Leader::class;
    protected static ?string $navigationIcon = 'heroicon-o-star';
    protected static ?string $navigationGroup = 'Kandungan';
    protected static ?string $modelLabel = 'Pimpinan';
    protected static ?string $pluralModelLabel = 'Pimpinan';
    protected static ?int $navigationSort = 3;

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Section::make('Maklumat Pimpinan')->schema([
                Forms\Components\TextInput::make('full_name')->label('Nama Penuh')->required()->maxLength(255),
                Forms\Components\TextInput::make('slug')->label('Slug')->required()->unique(ignoreRecord: true)->maxLength(255),
                Forms\Components\TextInput::make('position')->label('Jawatan')->required()->maxLength(255),
                Forms\Components\TextInput::make('sort_order')->label('Urutan')->numeric()->default(0),
                Forms\Components\Toggle::make('is_published')->label('Diterbitkan')->default(true),
                Forms\Components\SpatieMediaLibraryFileUpload::make('photo')
                    ->label('Foto')
                    ->collection('photo')
                    ->image()
                    ->imageResizeMode('cover')
                    ->imageCropAspectRatio('1:1')
                    ->maxSize(5120)
                    ->columnSpanFull(),
                Forms\Components\RichEditor::make('bio')->label('Biodata')->required()->columnSpanFull(),
                Forms\Components\Textarea::make('extra_info')->label('Maklumat Tambahan')->columnSpanFull(),
            ])->columns(2),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\SpatieMediaLibraryImageColumn::make('photo')->collection('photo')->circular()->label(''),
                Tables\Columns\TextColumn::make('full_name')->label('Nama')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('position')->label('Jawatan'),
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
            'index' => Pages\ListLeaders::route('/'),
            'create' => Pages\CreateLeader::route('/create'),
            'edit' => Pages\EditLeader::route('/{record}/edit'),
        ];
    }
}
