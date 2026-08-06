<?php

declare(strict_types=1);

namespace App\Filament\Resources;

use App\Filament\Resources\ProgramResource\Pages;
use App\Models\Program;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

final class ProgramResource extends Resource
{
    protected static ?string $model = Program::class;
    protected static ?string $navigationIcon = 'heroicon-o-flag';
    protected static ?string $navigationGroup = 'Content';
    protected static ?string $modelLabel = 'Program';
    protected static ?string $pluralModelLabel = 'Programs';
    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Section::make('Program Details')->schema([
                Forms\Components\TextInput::make('title')->label('Title')->required()->maxLength(255),
                Forms\Components\TextInput::make('slug')->label('Slug')->required()->unique(ignoreRecord: true)->maxLength(255),
                Forms\Components\Textarea::make('short_desc')->label('Short Description')->required(),
                Forms\Components\TextInput::make('sort_order')->label('Sort Order')->numeric()->default(0),
                Forms\Components\Toggle::make('is_published')->label('Published')->default(true),
                Forms\Components\SpatieMediaLibraryFileUpload::make('cover')
                    ->label('Cover Image')
                    ->collection('cover')
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
                Tables\Columns\SpatieMediaLibraryImageColumn::make('cover')->collection('cover')->label('')->square(),
                Tables\Columns\TextColumn::make('title')->label('Title')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('short_desc')->label('Description')->limit(50),
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
            'index' => Pages\ListPrograms::route('/'),
            'create' => Pages\CreateProgram::route('/create'),
            'edit' => Pages\EditProgram::route('/{record}/edit'),
        ];
    }
}
