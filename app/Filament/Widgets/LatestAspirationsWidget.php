<?php

declare(strict_types=1);

namespace App\Filament\Widgets;

use App\Models\Aspiration;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;

final class LatestAspirationsWidget extends BaseWidget
{
    protected static ?int $sort = 3;
    protected int|string|array $columnSpan = 'full';

    public function table(Table $table): Table
    {
        return $table
            ->query(Aspiration::query()->latest()->limit(5))
            ->columns([
                Tables\Columns\TextColumn::make('name')->label('Name'),
                Tables\Columns\TextColumn::make('email')->label('Email'),
                Tables\Columns\TextColumn::make('message')->label('Message')->limit(60),
                Tables\Columns\TextColumn::make('created_at')->label('Date')->dateTime('d M Y H:i'),
            ])
            ->heading('Latest 5 Aspirations')
            ->paginated(false);
    }
}
