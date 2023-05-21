<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Questions extends Model
{
    use HasFactory;
    protected $fillable=['questions','test_id'];
    public function correctAnswers(){
        return $this->hasMany(CorrectAnswers::class);
    }
    public function answers(){
        return $this->hasMany(Answer::class);
    }
}
