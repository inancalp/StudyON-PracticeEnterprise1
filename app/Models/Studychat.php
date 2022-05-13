<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Studychat extends Model
{
    use HasFactory;

    protected $table = "studychats";
    protected $fillable = [
        "studygroup_id",
        "text",
        ];


    public function user(){
        return $this->belongsTo(User::class);
    }
    
    public function studygroup(){
        return $this->belongsTo(Studygroup::class);
    }
    
}
