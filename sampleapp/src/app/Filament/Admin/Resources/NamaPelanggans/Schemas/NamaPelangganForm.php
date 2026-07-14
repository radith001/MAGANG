<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\NamaPelanggans\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

final class NamaPelangganForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('kode_ticket')
                    ->label('Kode Ticket')
                    ->disabled()
                    ->placeholder('Otomatis'),
                TextInput::make('nama_pelanggan')
                    ->label('Nama Pelanggan')
                    ->required()
                    ->maxLength(255),
                Textarea::make('alamat')
                    ->label('Alamat')
                    ->required()
                    ->rows(3),
                Select::make('keluhan_id')
                    ->label('Keluhan')
                    ->relationship('keluhan', 'nama_keluhan')
                    ->searchable()
                    ->preload()
                    ->required(),
                Select::make('status_id')
                    ->label('Status')
                    ->relationship('status', 'nama_status')
                    ->searchable()
                    ->preload()
                    ->required(),
            ]);
    }
}
