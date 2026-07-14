<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\Statuses\Pages;

use App\Filament\Admin\Resources\Statuses\StatusResource;
use Filament\Resources\Pages\CreateRecord;

final class CreateStatus extends CreateRecord
{
    protected static string $resource = StatusResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
