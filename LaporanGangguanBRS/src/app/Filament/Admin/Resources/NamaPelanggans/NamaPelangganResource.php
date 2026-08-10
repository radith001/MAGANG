<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\NamaPelanggans;

use App\Filament\Admin\Resources\NamaPelanggans\Pages\CreateNamaPelanggan;
use App\Filament\Admin\Resources\NamaPelanggans\Pages\EditNamaPelanggan;
use App\Filament\Admin\Resources\NamaPelanggans\Pages\ListNamaPelanggans;
use App\Filament\Admin\Resources\NamaPelanggans\Schemas\NamaPelangganForm;
use App\Filament\Admin\Resources\NamaPelanggans\Tables\NamaPelanggansTable;
use App\Models\NamaPelanggan;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

final class NamaPelangganResource extends Resource
{
    protected static ?string $model = NamaPelanggan::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::Ticket;

    protected static string|null|UnitEnum $navigationGroup = 'Manajemen Gangguan';

    protected static ?int $navigationSort = 1;

    protected static ?string $recordTitleAttribute = 'nama_pelanggan';

    public static function getNavigationBadge(): string
    {
        return (string) self::getModel()::count();
    }

    public static function form(Schema $schema): Schema
    {
        return NamaPelangganForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return NamaPelanggansTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index'  => ListNamaPelanggans::route('/'),
            'create' => CreateNamaPelanggan::route('/create'),
            'edit'   => EditNamaPelanggan::route('/{record}/edit'),
        ];
    }
}
