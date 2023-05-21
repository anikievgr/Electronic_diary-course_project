<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    use HasFactory;
    protected $fillable=['questions_id','answer'];
    public function correctAnswer(){
        return $this->hasMany(CorrectAnswers::class);
    }
}
