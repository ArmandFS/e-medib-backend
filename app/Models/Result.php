<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'score', 'fill_date'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
