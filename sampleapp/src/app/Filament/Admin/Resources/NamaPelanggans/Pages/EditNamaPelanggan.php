<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\NamaPelanggans\Pages;

use App\Filament\Admin\Resources\NamaPelanggans\NamaPelangganResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

final class EditNamaPelanggan extends EditRecord
{
    protected static string $resource = NamaPelangganResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
