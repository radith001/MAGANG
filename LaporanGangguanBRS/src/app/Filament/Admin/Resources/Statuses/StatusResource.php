<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\Statuses;

use App\Filament\Admin\Resources\Statuses\Pages\CreateStatus;
use App\Filament\Admin\Resources\Statuses\Pages\EditStatus;
use App\Filament\Admin\Resources\Statuses\Pages\ListStatuses;
use App\Filament\Admin\Resources\Statuses\Schemas\StatusForm;
use App\Filament\Admin\Resources\Statuses\Tables\StatusesTable;
use App\Models\Status;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

final class StatusResource extends Resource
{
    protected static ?string $model = Status::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::Tag;

    protected static string|null|UnitEnum $navigationGroup = 'Master Data';

    protected static ?int $navigationSort = 1;

    protected static ?string $recordTitleAttribute = 'nama_status';

    public static function getNavigationBadge(): string
    {
        return (string) self::getModel()::count();
    }

    public static function form(Schema $schema): Schema
    {
        return StatusForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return StatusesTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index'  => ListStatuses::route('/'),
            'create' => CreateStatus::route('/create'),
            'edit'   => EditStatus::route('/{record}/edit'),
        ];
    }
}
