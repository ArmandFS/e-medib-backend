<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Rekap extends Model
{
    use HasFactory;

    protected $fillable = [
        "gula_darah",
        "gula_darah_keterangan",
        "kolesterol",
        "kolesterol_keterangan",
        "gambar_luka",
        "catatan_luka",
        "total_konsumsi_kalori",
        "total_pembakaran_kalori",
        "catatan",
        'user_id'
    ];

    /**
     * Get the user that owns the Rekap
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
