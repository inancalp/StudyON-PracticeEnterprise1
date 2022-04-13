<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Question;

class Course extends Model
{

    protected $table = "courses";
    protected $fillable = ["title",];
    
    use HasFactory;

    public function questions(){
        return $this->hasMany(Question::class);
    }

    public function studygroup(){
        return $this->belongsTo(Studygroup::class);
    }

}
