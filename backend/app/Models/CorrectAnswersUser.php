<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CorrectAnswersUser extends Model
{
    use HasFactory;
    protected $fillable=['user_id','percentage','test_id'];
    public function test(){
        return $this->hasMany(Test::class);
    }
}
