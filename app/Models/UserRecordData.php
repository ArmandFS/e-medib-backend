<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserRecordData extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'bmi',
        'bmr',
        'disease_history',
        'alergic',
        'blood_pressure',
        'blood_sugar_level',
        'cholesterol',
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
