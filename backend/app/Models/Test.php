<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    use HasFactory;
    protected $fillable=['name','time','user_id'];
    public function questions(){
        return $this->hasMany(Questions::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
}
