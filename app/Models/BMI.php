<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class BMI extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'berat_badan',
        'tinggi_badan',
        'bmi',
        'status',
        'user_id',
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
