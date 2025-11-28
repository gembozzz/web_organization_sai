<?php

namespace App\Filament\Resources\Users;

use App\Filament\Resources\Users\Pages\CreateUser;
use App\Filament\Resources\Users\Pages\EditUser;
use App\Filament\Resources\Users\Pages\ListUsers;
use App\Filament\Resources\Users\Pages\ViewUser;
use App\Filament\Resources\Users\Schemas\UserForm;
use App\Filament\Resources\Users\Schemas\UserInfolist;
use App\Filament\Resources\Users\Tables\UsersTable;
use App\Models\User;
use BackedEnum;
use Illuminate\Database\Eloquent\Builder;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Filament\Facades\Filament;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'User ';

    public static function form(Schema $schema): Schema
    {
        return UserForm::configure($schema);
    }

    public static function canViewAny(): bool
    {
        // hanya user role admin, ketua, dan sekretaris yang boleh akses resource ini
        return in_array(Filament::auth()->user()?->role, ['admin', 'ketua', 'sekretaris', 'wakil_ketua']);
    }



    public static function canCreate(): bool
    {
        // hanya user role admin yang boleh membuat user baru
        return in_array(Filament::auth()->user()?->role, ['admin', 'ketua', 'sekretaris', 'wakil_ketua']);
    }

    public static function getNavigationLabel(): string
    {
        return 'Data Anggota';
    }

    public static function infolist(Schema $schema): Schema
    {
        return UserInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return UsersTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        $query = parent::getEloquentQuery();
        // hanya ambil user dengan role admin
        return parent::getEloquentQuery()
            ->whereIn('role', ['wakil_ketua', 'ketua', 'sekretaris', 'bendahara']);

        // Sembunyikan user dengan role admin
        return $query->where('role', '!=', 'admin');
    }

    public static function getPages(): array
    {
        return [
            'index' => ListUsers::route('/'),
            'create' => CreateUser::route('/create'),
            'view' => ViewUser::route('/{record}'),
            'edit' => EditUser::route('/{record}/edit'),
        ];
    }
}
