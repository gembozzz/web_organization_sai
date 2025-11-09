<?php

namespace App\Filament\Resources\JurnalKas;

use App\Filament\Resources\JurnalKas\Pages\CreateJurnalKas;
use App\Filament\Resources\JurnalKas\Pages\EditJurnalKas;
use App\Filament\Resources\JurnalKas\Pages\ListJurnalKas;
use App\Filament\Resources\JurnalKas\Pages\ViewJurnalKas;
use App\Filament\Resources\JurnalKas\Schemas\JurnalKasForm;
use App\Filament\Resources\JurnalKas\Schemas\JurnalKasInfolist;
use App\Filament\Resources\JurnalKas\Tables\JurnalKasTable;
use App\Models\Jurnalkas;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Filament\Facades\Filament;
use Illuminate\Database\Eloquent\Model;

class JurnalKasResource extends Resource
{
    protected static ?string $model = JurnalKas::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'Jurnal Kas';

    public static function form(Schema $schema): Schema
    {
        return JurnalKasForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return JurnalKasInfolist::configure($schema);
    }

    public static function canViewAny(): bool
    {
        // hanya user role bendahara, admin, ketua, dan sekretaris yang boleh akses resource ini
        return in_array(Filament::auth()->user()?->role, ['bendahara', 'admin', 'ketua', 'sekretaris', 'wakil_ketua']);
    }

    public static function canEdit(Model $record): bool
    {
        // hanya user role bendahara dan admin yang boleh edit record
        return in_array(Filament::auth()->user()?->role, ['bendahara', 'admin']);
    }

    public static function canCreate(): bool
    {
        // hanya user role bendahara dan admin yang boleh membuat record
        return in_array(Filament::auth()->user()?->role, ['bendahara', 'admin']);
    }

    public static function canDelete(Model $record): bool
    {
        // hanya user role bendahara dan admin yang boleh menghapus record
        return in_array(Filament::auth()->user()?->role, ['bendahara', 'admin']);
    }

    public static function table(Table $table): Table
    {
        return JurnalKasTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListJurnalKas::route('/'),
            'create' => CreateJurnalKas::route('/create'),
            'view' => ViewJurnalKas::route('/{record}'),
            'edit' => EditJurnalKas::route('/{record}/edit'),
        ];
    }
}
