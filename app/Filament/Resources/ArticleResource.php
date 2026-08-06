<?php

declare(strict_types=1);

namespace App\Filament\Resources;

use App\Enums\ArticleStatus;
use App\Filament\Resources\ArticleResource\Pages;
use App\Models\Article;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

final class ArticleResource extends Resource
{
    protected static ?string $model = Article::class;
    protected static ?string $navigationIcon = 'heroicon-o-document-text';
    protected static ?string $navigationGroup = 'Kandungan';
    protected static ?string $modelLabel = 'Artikel';
    protected static ?string $pluralModelLabel = 'Artikel';
    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Section::make('Maklumat Artikel')->schema([
                Forms\Components\TextInput::make('title')
                    ->label('Tajuk')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('slug')
                    ->label('Slug')
                    ->required()
                    ->unique(ignoreRecord: true)
                    ->maxLength(255),
                Forms\Components\TextInput::make('author')
                    ->label('Penulis')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('category')
                    ->label('Kategori')
                    ->maxLength(255),
                Forms\Components\Select::make('status')
                    ->label('Status')
                    ->options(ArticleStatus::class)
                    ->required()
                    ->default(ArticleStatus::Draft),
                Forms\Components\DateTimePicker::make('published_at')
                    ->label('Tarikh Terbit'),
                Forms\Components\SpatieMediaLibraryFileUpload::make('thumbnail')
                    ->label('Gambar Utama')
                    ->collection('thumbnail')
                    ->image()
                    ->imageResizeMode('cover')
                    ->imageCropAspectRatio('16:9')
                    ->maxSize(5120)
                    ->columnSpanFull(),
                Forms\Components\RichEditor::make('content')
                    ->label('Kandungan')
                    ->required()
                    ->columnSpanFull(),
            ])->columns(2),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\SpatieMediaLibraryImageColumn::make('thumbnail')
                    ->collection('thumbnail')
                    ->circular()
                    ->label(''),
                Tables\Columns\TextColumn::make('title')
                    ->label('Tajuk')
                    ->searchable()
                    ->limit(50),
                Tables\Columns\TextColumn::make('author')
                    ->label('Penulis')
                    ->searchable(),
                Tables\Columns\TextColumn::make('status')
                    ->label('Status')
                    ->badge()
                    ->color(fn (ArticleStatus $state): string => match ($state) {
                        ArticleStatus::Draft => 'gray',
                        ArticleStatus::Published => 'success',
                    }),
                Tables\Columns\TextColumn::make('published_at')
                    ->label('Tarikh Terbit')
                    ->dateTime('d M Y')
                    ->sortable(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('status')
                    ->options(ArticleStatus::class),
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
            ->defaultSort('published_at', 'desc');
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListArticles::route('/'),
            'create' => Pages\CreateArticle::route('/create'),
            'edit' => Pages\EditArticle::route('/{record}/edit'),
        ];
    }
}
