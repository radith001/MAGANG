<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\Keluhans\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

final class KeluhanForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('nama_keluhan')
                    ->label('Nama Keluhan')
                    ->required()
                    ->maxLength(255),
            ]);
    }
}
