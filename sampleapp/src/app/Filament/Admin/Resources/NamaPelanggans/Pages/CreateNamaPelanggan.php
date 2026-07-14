<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\NamaPelanggans\Pages;

use App\Filament\Admin\Resources\NamaPelanggans\NamaPelangganResource;
use Filament\Resources\Pages\CreateRecord;

final class CreateNamaPelanggan extends CreateRecord
{
    protected static string $resource = NamaPelangganResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
