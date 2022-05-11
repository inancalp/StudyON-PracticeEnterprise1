<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Repeaton extends Model
{
    use HasFactory;
    
    protected $table = "repeatons";
    protected $fillable = [
        "question",
        "correct_answer",
        "easy",
        "medium",
        "hard",
    ];

    public function user(){

       return $this->belongsTo(User::class);

    }

}
