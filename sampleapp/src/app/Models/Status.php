<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Status extends Model
{
    protected $fillable = [
        'nama_status',
    ];

    public function namaPelanggans(): HasMany
    {
        return $this->hasMany(NamaPelanggan::class, 'status_id');
    }
}
