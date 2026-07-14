<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\Keluhans\Pages;

use App\Filament\Admin\Resources\Keluhans\KeluhanResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;
use Filament\Support\Icons\Heroicon;

final class ListKeluhans extends ListRecords
{
    protected static string $resource = KeluhanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make()
                ->label('Tambah Keluhan')
                ->icon(Heroicon::Plus),
        ];
    }
}
