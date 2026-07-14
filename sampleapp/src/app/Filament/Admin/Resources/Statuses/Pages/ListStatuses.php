<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\Statuses\Pages;

use App\Filament\Admin\Resources\Statuses\StatusResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;
use Filament\Support\Icons\Heroicon;

final class ListStatuses extends ListRecords
{
    protected static string $resource = StatusResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make()
                ->label('Tambah Status')
                ->icon(Heroicon::Plus),
        ];
    }
}
