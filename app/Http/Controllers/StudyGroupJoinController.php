<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StudyGroup;


class StudyGroupJoinController extends Controller
{
    function store(StudyGroup $studygroup){
        return $studygroup->name;
    }
}
