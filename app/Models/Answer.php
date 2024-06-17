<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    use HasFactory;
<<<<<<< HEAD
    protected $fillable = ['question_id',  'answer_value', 'user_id'];
=======
    protected $fillable = ['question_id', 'option_id', 'answer_value', 'user_id'];
>>>>>>> e553b755ce938868e8461cccd5cb1919901cdf83

    public function question()
    {
        return $this->belongsTo(Question::class);
    }

    public function option()
    {
        return $this->belongsTo(Option::class);
    }

<<<<<<< HEAD
=======




>>>>>>> e553b755ce938868e8461cccd5cb1919901cdf83
}
