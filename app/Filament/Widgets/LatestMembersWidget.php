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
                Tables\Columns\TextColumn::make('full_name')->label('Name'),
                Tables\Columns\TextColumn::make('identity_number')->label('IC Number'),
                Tables\Columns\TextColumn::make('presint')->label('Precinct'),
                Tables\Columns\TextColumn::make('aid_status')->label('Aid Status')->badge(),
                Tables\Columns\TextColumn::make('created_at')->label('Date')->dateTime('d M Y'),
            ])
            ->heading('Latest 5 Members')
            ->paginated(false);
    }
}
