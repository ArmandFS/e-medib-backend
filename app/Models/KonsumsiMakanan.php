<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class KonsumsiMakanan extends Model
{
    use HasFactory;

    protected $fillable = [
        'makanan',
        'porsi',
        'kalori',
        'jenis_waktu_makan',
        'user_id'
    ];

      /**
     * Get the owner that owns the UserRecordData
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
