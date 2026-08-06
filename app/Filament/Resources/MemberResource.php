<?php

declare(strict_types=1);

namespace App\Filament\Resources;

use App\Enums\AidStatus;
use App\Enums\IdentityType;
use App\Filament\Resources\MemberResource\Pages;
use App\Models\Member;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

final class MemberResource extends Resource
{
    protected static ?string $model = Member::class;
    protected static ?string $navigationIcon = 'heroicon-o-user-group';
    protected static ?string $navigationGroup = 'Pendaftaran';
    protected static ?string $modelLabel = 'Ahli';
    protected static ?string $pluralModelLabel = 'Ahli';
    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Section::make('Maklumat Ahli')->schema([
                Forms\Components\TextInput::make('full_name')
                    ->label('Nama Penuh')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('identity_number')
                    ->label('No. Kad Pengenalan')
                    ->required()
                    ->maxLength(50),
                Forms\Components\Select::make('identity_type')
                    ->label('Jenis Dokumen')
                    ->options(IdentityType::class)
                    ->required(),
                Forms\Components\DatePicker::make('birth_date')
                    ->label('Tarikh Lahir')
                    ->required(),
                Forms\Components\TextInput::make('phone')
                    ->label('Telefon')
                    ->tel()
                    ->required(),
                Forms\Components\TextInput::make('email')
                    ->label('E-mel')
                    ->email()
                    ->required(),
                Forms\Components\Textarea::make('address')
                    ->label('Alamat')
                    ->required(),
                Forms\Components\TextInput::make('presint')
                    ->label('Presint')
                    ->required()
                    ->maxLength(100),
                Forms\Components\Select::make('aid_status')
                    ->label('Status Bantuan')
                    ->options(AidStatus::class)
                    ->default(AidStatus::Diterima),
            ])->columns(2),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('full_name')
                    ->label('Nama')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('identity_number')
                    ->label('No. KP')
                    ->searchable(),
                Tables\Columns\TextColumn::make('presint')
                    ->label('Presint'),
                Tables\Columns\TextColumn::make('aid_status')
                    ->label('Status Bantuan')
                    ->badge()
                    ->color(fn (AidStatus $state): string => match ($state) {
                        AidStatus::Diterima => 'info',
                        AidStatus::SedangDirancang => 'warning',
                        AidStatus::Selesai => 'success',
                        AidStatus::BelumAdaTindakan => 'danger',
                    }),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Tarikh Daftar')
                    ->dateTime('d M Y')
                    ->sortable(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('aid_status')
                    ->options(AidStatus::class),
                Tables\Filters\SelectFilter::make('presint')
                    ->options(fn () => Member::query()->distinct()->pluck('presint', 'presint')->toArray()),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
            ])
            ->defaultSort('created_at', 'desc');
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListMembers::route('/'),
            'create' => Pages\CreateMember::route('/create'),
            'edit' => Pages\EditMember::route('/{record}/edit'),
        ];
    }
}
