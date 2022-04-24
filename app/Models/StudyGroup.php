<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Course;

class Studygroup extends Model
{
    use HasFactory;
    // copied from user
    protected $table = "studygroups";
    protected $fillable = [
        'user_id',
        'name',
        'password',
        'description',
    ];

    // THIS ONE IS USED FOR THE SINGLE ADMIN PURPOSES YET IT MIGHT CHANGE WITH AN UPDATE
    public function user(){
        return $this->belongsTo(User::class);
    }

    function members(){
        return $this->belongsToMany(User::class);
    }

    public function courses(){
        return $this->hasMany(Course::class);
    }
}
