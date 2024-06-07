<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AktivitasDariUser extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_nama_aktivitas',
        'nama_aktivitas',
        'met',
        'durasi',
        'kalori',
        'tingkat_aktivitas',
        'user_id',
    ];

    /**
     * Get the user that owns the AktivitasDariUser
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
