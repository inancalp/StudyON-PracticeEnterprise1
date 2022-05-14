<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Studygroup;

class Questionbank extends Model
{
    use HasFactory;

    protected $table = "questionbanks";
    protected $fillable = [
        "question",
        "correct_answer",
    ];

    public function studygroup(){
       return $this->belongsTo(Studygroup::class);
    }
}
