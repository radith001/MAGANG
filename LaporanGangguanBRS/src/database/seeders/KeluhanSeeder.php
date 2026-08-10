<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Keluhan;
use Illuminate\Database\Seeder;

class KeluhanSeeder extends Seeder
{
    public function run(): void
    {
        $keluhans = [
            'Lampu LOS Merah',
            'Internet Lambat',
            'Modem Mati / Rusak',
            'Wifi Tidak Terdeteksi',
        ];

        foreach ($keluhans as $keluhan) {
            Keluhan::firstOrCreate(['nama_keluhan' => $keluhan]);
        }
    }
}
