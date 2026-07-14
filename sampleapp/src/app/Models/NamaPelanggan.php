<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class NamaPelanggan extends Model
{
    protected $table = 'pelanggans';

    protected $fillable = [
        'kode_ticket',
        'nama_pelanggan',
        'alamat',
        'keluhan_id',
        'status_id',
    ];

    protected static function booted(): void
    {
        static::creating(function (self $model): void {
            $lastId = self::max('id') ?? 0;
            $model->kode_ticket = 'BRS' . str_pad((string) ($lastId + 1), 4, '0', STR_PAD_LEFT);
        });
    }

    public function status(): BelongsTo
    {
        return $this->belongsTo(Status::class, 'status_id');
    }

    public function keluhan(): BelongsTo
    {
        return $this->belongsTo(Keluhan::class, 'keluhan_id');
    }
}
