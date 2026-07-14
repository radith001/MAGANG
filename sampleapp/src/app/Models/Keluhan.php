<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Keluhan extends Model
{
    protected $fillable = [
        'nama_keluhan',
    ];

    public function namaPelanggans(): HasMany
    {
        return $this->hasMany(NamaPelanggan::class, 'keluhan_id');
    }
}
