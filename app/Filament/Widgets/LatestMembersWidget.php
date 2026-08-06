<?php

declare(strict_types=1);

namespace App\Filament\Widgets;

use App\Models\Member;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;

final class LatestMembersWidget extends BaseWidget
{
    protected static ?int $sort = 2;
    protected int|string|array $columnSpan = 'full';

    public function table(Table $table): Table
    {
        return $table
            ->query(Member::query()->latest()->limit(5))
            ->columns([
                Tables\Columns\TextColumn::make('full_name')->label('Nama'),
                Tables\Columns\TextColumn::make('identity_number')->label('No. KP'),
                Tables\Columns\TextColumn::make('presint')->label('Presint'),
                Tables\Columns\TextColumn::make('aid_status')->label('Status Bantuan')->badge(),
                Tables\Columns\TextColumn::make('created_at')->label('Tarikh')->dateTime('d M Y'),
            ])
            ->heading('5 Pendaftaran Terkini')
            ->paginated(false);
    }
}
