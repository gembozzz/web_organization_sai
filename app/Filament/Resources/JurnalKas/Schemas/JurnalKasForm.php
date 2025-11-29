<?php

namespace App\Filament\Resources\JurnalKas\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Hidden;
use Filament\Schemas\Schema;
use App\Models\JenisTransaksi;
use Filament\Forms\Components\TextInput;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class JurnalKasForm
{
    public static function configure(Schema $schema): Schema
    {
        $tipe = Str::upper(request()->query('tipe', ''));
        return $schema->components([
            TextInput::make('nama')
                ->label('Nama Donatur')
                ->required()
                ->placeholder('Masukkan nama donatur'),
            TextInput::make('no_tlp')
                ->label('No. Telepon')
                ->required()
                ->placeholder('Masukkan nomor telepon'),
            TextInput::make('email')
                ->label('Email')
                ->required()
                ->email()
                ->placeholder('Masukkan email'),
            DatePicker::make('tanggal')
                ->label('Tanggal')
                ->required(),
            Select::make('status')
                ->options([
                    'waiting_approval' => 'Waiting approval',
                    'approved' => 'Approved',
                    'rejected' => 'Rejected',
                ])
                ->default('waiting_approval')
                ->required(),
            // Ambil data jenis transaksi dari tabel jenis_transaksi
            Textarea::make('keterangan')
                ->label('Keterangan')
                ->required()
                ->rows(3),
            Select::make('jenis_transaksi_id')
                ->label('Jenis Transaksi')
                ->options(
                    JenisTransaksi::where(function ($query) use ($tipe) {
                        if (in_array($tipe, ['MASUK', 'KELUAR'])) {
                            $query->where('tipe_transaksi', $tipe);
                        }
                    })
                        ->orderBy('nama_transaksi')
                        ->pluck('nama_transaksi', 'id')
                        ->toArray() // Pastikan outputnya adalah array
                )
                ->searchable()
                ->required(),
            TextInput::make('nominal')
                ->label('Nominal')
                ->numeric()          // opsional: hanya menerima angka
                ->required()         // opsional: wajib diisi
                ->placeholder('Masukkan nominal')
                ->prefix('Rp')       // opsional: tampilkan prefix
                ->minValue(0),       // opsional: minimal nilai 0
            Select::make('metode')
                ->label('Metode Pembayaran')
                ->options([
                    'CASH' => 'Cash',
                    'TRANSFER' => 'Transfer',
                ])
                ->required(),
            // Petugas otomatis dari user login
            Hidden::make('petugas')
                ->default(fn() => Auth::id())
                ->dehydrateStateUsing(fn($state) => $state ?? Auth::id()),
        ]);
    }
}
