<?php

declare(strict_types=1);

namespace App\Filament\Resources;

use App\Filament\Resources\ProgramResource\Pages;
use App\Filament\Resources\ProgramResource\Widgets\ProgramStatsWidget;
use App\Models\Program;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\HtmlString;

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
            Forms\Components\Section::make('Maklumat Asas')
                ->schema([
                    Forms\Components\TextInput::make('title')
                        ->label('Tajuk Program')
                        ->validationAttribute('Tajuk Program')
                        ->required()
                        ->maxLength(255),
                    Forms\Components\Textarea::make('short_desc')
                        ->label('Penerangan Ringkas')
                        ->validationAttribute('Penerangan Ringkas')
                        ->helperText('Dipaparkan pada senarai program.')
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
                        ->visible(fn (?Program $record) => $record !== null
                            && ! $record->hasMedia('cover')
                            && $record->image_path !== null && $record->image_path !== '')
                        ->content(fn (Program $record) => new HtmlString(
                            '<img src="'.e(asset(ltrim((string) $record->image_path, '/'))).'" alt="Gambar semasa" class="max-h-40 rounded-lg border border-gray-200 dark:border-white/10" />'
                        ))
                        ->columnSpanFull(),
                    Forms\Components\SpatieMediaLibraryFileUpload::make('cover')
                        ->label('Gambar Program')
                        ->helperText('Mana-mana resolusi diterima. Gambar dimampatkan secara automatik.')
                        ->collection('cover')
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
                Tables\Columns\ImageColumn::make('cover_preview')
                    ->label('')
                    ->state(fn (Program $record) => $record->getFirstMediaUrl('cover', 'thumb') ?: ($record->image_path ? asset(ltrim($record->image_path, '/')) : asset('assets/program-sukan.jpg')))
                    ->square()
                    ->width(60)
                    ->height(60),
                Tables\Columns\TextColumn::make('title')->label('Tajuk')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('short_desc')->label('Penerangan')->limit(50),
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
            'index' => Pages\ListPrograms::route('/'),
            'create' => Pages\CreateProgram::route('/create'),
            'edit' => Pages\EditProgram::route('/{record}/edit'),
        ];
    }

    public static function getWidgets(): array
    {
        return [
            ProgramStatsWidget::class,
        ];
    }
}
