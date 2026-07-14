<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Status;
use Illuminate\Database\Seeder;

class StatusSeeder extends Seeder
{
    public function run(): void
    {
        $statuses = ['Open', 'In Progress', 'Resolved'];

        foreach ($statuses as $status) {
            Status::firstOrCreate(['nama_status' => $status]);
        }
    }
}
