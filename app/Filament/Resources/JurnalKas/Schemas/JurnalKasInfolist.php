<?php

namespace App\Filament\Resources\JurnalKas\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class JurnalKasInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('nama')
                    ->label('Nama Donatur'),
                TextEntry::make('no_tlp')
                    ->label('No. Telepon'),
                TextEntry::make('email')
                    ->label('Email'),
                TextEntry::make('status')
                    ->label('Status')
                    ->badge()
                    ->color(fn(string $state): string => match ($state) {
                        'waiting_approval' => 'warning',
                        'approved'         => 'success',
                        'rejected'         => 'danger',
                        default            => 'secondary',
                    }),
                TextEntry::make('tanggal')
                    ->label('Tanggal')
                    ->date(),
                TextEntry::make('keterangan')
                    ->label('Keterangan'),

                TextEntry::make('user.name')
                    ->label('Petugas'),

                TextEntry::make('nominal')
                    ->label('Nominal'),

                TextEntry::make('jenisTransaksi.nama_transaksi')
                    ->label('Jenis Transaksi'),

                TextEntry::make('metode')
                    ->label('Metode')
                    ->badge()
                    ->color(fn(string $state): string => $state === 'CASH' ? 'success' : 'info'),

                TextEntry::make('created_at')
                    ->label('Dibuat')
                    ->dateTime()
                    ->placeholder('-'),

                TextEntry::make('updated_at')
                    ->label('Diperbarui')
                    ->dateTime()
                    ->placeholder('-'),
            ]);
    }
}
