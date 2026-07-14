<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\Statuses\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

final class StatusForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('nama_status')
                    ->label('Nama Status')
                    ->required()
                    ->maxLength(255),
            ]);
    }
}
