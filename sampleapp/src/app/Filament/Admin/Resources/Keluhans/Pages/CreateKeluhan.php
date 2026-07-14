<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\Keluhans\Pages;

use App\Filament\Admin\Resources\Keluhans\KeluhanResource;
use Filament\Resources\Pages\CreateRecord;

final class CreateKeluhan extends CreateRecord
{
    protected static string $resource = KeluhanResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
