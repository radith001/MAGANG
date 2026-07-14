<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\NamaPelanggans\Pages;

use App\Filament\Admin\Resources\NamaPelanggans\NamaPelangganResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;
use Filament\Support\Icons\Heroicon;

final class ListNamaPelanggans extends ListRecords
{
    protected static string $resource = NamaPelangganResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make()
                ->label('Tambah Pelanggan')
                ->icon(Heroicon::Plus),
        ];
    }
}
