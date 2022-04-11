<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Studygroup extends Model
{
    use HasFactory;
    // copied from user
    protected $table = "study_groups";
    protected $fillable = [
        'user_id',
        'name',
        'password',
        'description',
    ];

    public function user(){
        return $this->belongsTo(User::class); //NO! manyTomany relationship
    }

    function members(){
        return $this->belongsToMany(User::class);
    }
}
