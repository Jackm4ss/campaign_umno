<?php

declare(strict_types=1);

namespace App\Filament\Resources;

use App\Enums\AidStatus;
use App\Enums\AidType;
use App\Enums\IdentityType;
use App\Filament\Resources\MemberResource\Pages;
use App\Filament\Resources\MemberResource\Widgets\MemberStatsWidget;
use App\Models\Member;
use App\Support\SubmissionSources;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Infolists;
use Filament\Infolists\Infolist;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\HtmlString;

final class MemberResource extends Resource
{
    protected static ?string $model = Member::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-group';

    protected static ?string $navigationGroup = 'Submissions';

    protected static ?string $modelLabel = 'Member';

    protected static ?string $pluralModelLabel = 'Members';

    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Section::make('Member Information')->schema([
                Forms\Components\TextInput::make('full_name')
                    ->label('Full Name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('identity_number')
                    ->label('Identity Number')
                    ->required()
                    ->maxLength(50),
                Forms\Components\Select::make('identity_type')
                    ->label('Identity Type')
                    ->options(IdentityType::class)
                    ->required(),
                Forms\Components\DatePicker::make('birth_date')
                    ->label('Date of Birth')
                    ->required(),
                Forms\Components\TextInput::make('phone')
                    ->label('Phone')
                    ->tel()
                    ->required(),
                Forms\Components\TextInput::make('email')
                    ->label('Email')
                    ->email()
                    ->required(),
                Forms\Components\Textarea::make('address')
                    ->label('Address')
                    ->required(),
                Forms\Components\TextInput::make('presint')
                    ->label('Precinct')
                    ->required()
                    ->maxLength(100),
                Forms\Components\Select::make('aid_status')
                    ->label('Aid Status')
                    ->options(AidStatus::class)
                    ->default(AidStatus::BelumAdaTindakan)
                    ->required(),
                Forms\Components\Select::make('source')
                    ->label('Platform')
                    ->helperText('Where this registration came from.')
                    ->options(SubmissionSources::labels())
                    ->default('direct')
                    ->required(),
            ])->columns(2),

            Forms\Components\Section::make('Jenis Bantuan')
                ->schema([
                    Forms\Components\Repeater::make('aidRequests')
                        ->label('Permohonan Bantuan')
                        ->relationship('aidRequests')
                        ->defaultItems(0)
                        ->schema([
                            Forms\Components\Select::make('type')
                                ->label('Jenis Bantuan')
                                ->options(fn () => collect(AidType::cases())
                                    ->mapWithKeys(fn (AidType $type) => [$type->value => $type->label()])
                                    ->all())
                                ->required()
                                ->live(),
                            Forms\Components\TextInput::make('patient_name')
                                ->label('Nama Pesakit')
                                ->maxLength(255)
                                ->visible(fn (Forms\Get $get) => $get('type') === AidType::KatilHospitalKerusiRoda->value),
                            Forms\Components\TextInput::make('patient_identity_number')
                                ->label('No. KP Pesakit')
                                ->maxLength(50)
                                ->visible(fn (Forms\Get $get) => $get('type') === AidType::KatilHospitalKerusiRoda->value),
                            Forms\Components\TextInput::make('patient_phone')
                                ->label('No. Telefon Pesakit')
                                ->tel()
                                ->maxLength(50)
                                ->visible(fn (Forms\Get $get) => $get('type') === AidType::KatilHospitalKerusiRoda->value),
                            Forms\Components\Textarea::make('patient_address')
                                ->label('Alamat Pesakit')
                                ->rows(2)
                                ->visible(fn (Forms\Get $get) => $get('type') === AidType::KatilHospitalKerusiRoda->value),
                        ])
                        ->collapsible()
                        ->collapsed()
                        ->columnSpanFull(),
                ]),

            Forms\Components\Section::make('Lampiran (dari borang)')
                ->description('Photo and voter proof uploaded through the public form, if any.')
                ->schema([
                    Forms\Components\Placeholder::make('photo_preview')
                        ->label('Gambar')
                        ->visible(fn (?Member $record) => $record !== null && $record->photo_path !== null && $record->photo_path !== '')
                        ->content(fn (Member $record) => new HtmlString(
                            '<img src="'.e(Storage::disk('public')->url($record->photo_path)).'" alt="Gambar ahli" class="max-h-48 rounded-lg border border-gray-200 dark:border-white/10" />'
                        )),
                    Forms\Components\Placeholder::make('photo_none')
                        ->label('Gambar')
                        ->visible(fn (?Member $record) => $record === null || $record->photo_path === null || $record->photo_path === '')
                        ->content('Tiada gambar dimuat naik.'),
                    Forms\Components\Placeholder::make('voter_proof_preview')
                        ->label('Bukti Daftar Pemilih')
                        ->visible(fn (?Member $record) => $record !== null && $record->voter_proof_path !== null && $record->voter_proof_path !== '')
                        ->content(fn (Member $record) => str_ends_with((string) $record->voter_proof_path, '.pdf')
                            ? new HtmlString('<a class="fi-link group/link relative inline-flex items-center justify-center outline-none fi-color-primary" href="'.e(Storage::disk('public')->url($record->voter_proof_path)).'" target="_blank" rel="noopener">Buka PDF bukti daftar pemilih</a>')
                            : new HtmlString('<img src="'.e(Storage::disk('public')->url($record->voter_proof_path)).'" alt="Bukti daftar pemilih" class="max-h-48 rounded-lg border border-gray-200 dark:border-white/10" />')),
                    Forms\Components\Placeholder::make('voter_proof_none')
                        ->label('Bukti Daftar Pemilih')
                        ->visible(fn (?Member $record) => $record === null || $record->voter_proof_path === null || $record->voter_proof_path === '')
                        ->content('Tiada bukti daftar pemilih dimuat naik.'),
                ])
                ->columns(2),
        ]);
    }

    public static function infolist(Infolist $infolist): Infolist
    {
        return $infolist->schema([
            Infolists\Components\Section::make('Maklumat Diri')
                ->schema([
                    Infolists\Components\ImageEntry::make('photo_path')
                        ->label('Gambar')
                        ->disk('public')
                        ->height(96)
                        ->placeholder('Tiada gambar'),
                    Infolists\Components\TextEntry::make('full_name')->label('Nama Penuh'),
                    Infolists\Components\TextEntry::make('identity_number')->label('No. KP'),
                    Infolists\Components\TextEntry::make('identity_type')->label('Jenis KP'),
                    Infolists\Components\TextEntry::make('birth_date')->label('Tarikh Lahir')->date('d M Y'),
                    Infolists\Components\TextEntry::make('phone')->label('No. Telefon'),
                    Infolists\Components\TextEntry::make('email')->label('E-mel'),
                    Infolists\Components\TextEntry::make('address')->label('Alamat')->columnSpanFull(),
                    Infolists\Components\TextEntry::make('presint')->label('Presint'),
                    Infolists\Components\TextEntry::make('source')
                        ->label('Platform')
                        ->badge()
                        ->formatStateUsing(fn (?string $state) => SubmissionSources::label($state ?: 'direct')),
                    Infolists\Components\TextEntry::make('created_at')->label('Didaftarkan')->dateTime('d M Y H:i'),
                ])
                ->columns(3),

            Infolists\Components\Section::make('Jenis Bantuan')
                ->schema([
                    Infolists\Components\RepeatableEntry::make('aidRequests')
                        ->label('')
                        ->schema([
                            Infolists\Components\TextEntry::make('type')
                                ->label('Jenis')
                                ->badge()
                                ->formatStateUsing(fn (AidType $state) => $state->label()),
                            Infolists\Components\TextEntry::make('patient_name')
                                ->label('Nama Pesakit')
                                ->placeholder('—'),
                            Infolists\Components\TextEntry::make('patient_phone')
                                ->label('No. Telefon Pesakit')
                                ->placeholder('—'),
                        ])
                        ->columnSpanFull(),
                ]),

            Infolists\Components\Section::make('Pengesahan')
                ->schema([
                    Infolists\Components\TextEntry::make('aid_status')
                        ->label('Status Bantuan')
                        ->badge()
                        ->formatStateUsing(fn (AidStatus $state) => $state->label())
                        ->color(fn (AidStatus $state): string => match ($state) {
                            AidStatus::Diterima => 'info',
                            AidStatus::SedangDirancang => 'warning',
                            AidStatus::Selesai => 'success',
                            AidStatus::BelumAdaTindakan => 'danger',
                        }),
                    Infolists\Components\ImageEntry::make('voter_proof_path')
                        ->label('Bukti Daftar Pemilih')
                        ->disk('public')
                        ->height(96)
                        ->placeholder('Tiada bukti dimuat naik'),
                ])
                ->columns(2),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ViewColumn::make('full_name')
                    ->label('Nama')
                    ->view('filament.tables.columns.initials-avatar')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('phone')
                    ->label('No. Telefon')
                    ->searchable(),
                Tables\Columns\TextColumn::make('aidRequests.type')
                    ->label('Jenis Bantuan')
                    ->badge()
                    ->formatStateUsing(fn ($state) => $state instanceof AidType ? $state->label() : (string) $state)
                    ->color(fn ($state) => match (true) {
                        $state instanceof AidType && $state === AidType::KatilHospitalKerusiRoda => 'danger',
                        $state instanceof AidType && $state === AidType::WangTunai => 'success',
                        default => 'gray',
                    })
                    ->listWithLineBreaks()
                    ->placeholder('—'),
                Tables\Columns\TextColumn::make('presint')
                    ->label('Presint'),
                Tables\Columns\TextColumn::make('aid_status')
                    ->label('Status Bantuan')
                    ->badge()
                    ->formatStateUsing(fn (AidStatus $state) => $state->label())
                    ->color(fn (AidStatus $state): string => match ($state) {
                        AidStatus::Diterima => 'info',
                        AidStatus::SedangDirancang => 'warning',
                        AidStatus::Selesai => 'success',
                        AidStatus::BelumAdaTindakan => 'danger',
                    }),
                Tables\Columns\TextColumn::make('source')
                    ->label('Platform')
                    ->badge()
                    ->formatStateUsing(fn (?string $state) => SubmissionSources::label($state ?: 'direct')),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('aid_status')
                    ->label('Status Bantuan')
                    ->options(AidStatus::class),
                Tables\Filters\SelectFilter::make('presint')
                    ->label('Presint')
                    ->options(fn () => Member::query()->distinct()->orderBy('presint')->pluck('presint', 'presint')->toArray()),
                Tables\Filters\SelectFilter::make('source')
                    ->label('Platform')
                    ->options(SubmissionSources::labels()),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
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
            'index' => Pages\ListMembers::route('/'),
            'create' => Pages\CreateMember::route('/create'),
            'edit' => Pages\EditMember::route('/{record}/edit'),
        ];
    }

    /** @return array<class-string> */
    public static function getWidgets(): array
    {
        return [
            MemberStatsWidget::class,
        ];
    }
}
