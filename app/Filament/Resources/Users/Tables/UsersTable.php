<?php

namespace App\Filament\Resources\Users\Tables;

use Dom\Text;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;


use function Laravel\Prompts\text;

class UsersTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->searchable(),
                TextColumn::make('email')
                    ->searchable(),
                TextColumn::make('no_tlp')
                    ->label('No. Telepon')
                    ->searchable(),
                TextColumn::make('alamat')
                    ->searchable()
                    ->limit(50)
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('city_of_practice')
                    ->label('Kota Praktik')
                    ->searchable()
                    ->limit(50)
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('kampus')
                    ->label('Kampus')
                    ->searchable(),
                ImageColumn::make('foto')
                    ->label('Pasfoto')
                    ->getStateUsing(fn($record) => $record->foto ? asset('storage/' . $record->foto) : null)
                    ->square()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('nm_institusi')
                    ->label('Nama Institusi')
                    ->searchable(),
                TextColumn::make('institusi.nm_institusi')
                    ->label('Institusi')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('role')
                    ->label('Jabatan')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([])
            ->recordActions([
                ViewAction::make(),
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
