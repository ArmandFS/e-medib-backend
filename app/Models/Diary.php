<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Diary extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'calory_intake',
        'blood_sugar',
        'blood_presure',
        'injury_img',
        'injury_desc',
        'temperature',
        'diary',
        'last_visit',
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
