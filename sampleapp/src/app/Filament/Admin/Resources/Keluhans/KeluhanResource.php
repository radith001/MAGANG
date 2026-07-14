<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\Keluhans;

use App\Filament\Admin\Resources\Keluhans\Pages\CreateKeluhan;
use App\Filament\Admin\Resources\Keluhans\Pages\EditKeluhan;
use App\Filament\Admin\Resources\Keluhans\Pages\ListKeluhans;
use App\Filament\Admin\Resources\Keluhans\Schemas\KeluhanForm;
use App\Filament\Admin\Resources\Keluhans\Tables\KeluhansTable;
use App\Models\Keluhan;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

final class KeluhanResource extends Resource
{
    protected static ?string $model = Keluhan::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::ExclamationTriangle;

    protected static string|null|UnitEnum $navigationGroup = 'Master Data';

    protected static ?int $navigationSort = 2;

    protected static ?string $recordTitleAttribute = 'nama_keluhan';

    public static function getNavigationBadge(): string
    {
        return (string) self::getModel()::count();
    }

    public static function form(Schema $schema): Schema
    {
        return KeluhanForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return KeluhansTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index'  => ListKeluhans::route('/'),
            'create' => CreateKeluhan::route('/create'),
            'edit'   => EditKeluhan::route('/{record}/edit'),
        ];
    }
}
