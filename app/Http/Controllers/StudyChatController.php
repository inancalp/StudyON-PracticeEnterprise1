<?php

namespace App\Http\Controllers;

use App\Models\Studychat;
use Illuminate\Http\Request;
use App\Models\Studygroup;
use App\Notifications\StudychatNotification;

class StudyChatController extends Controller
{

    public function show(Studygroup $studygroup){

        if(!$studygroup->members->where("id", auth()->user()->id)->first()){
            return abort(404);
        };

        return view("studychat.show", compact("studygroup"));

    }


    public function store(Studygroup $studygroup){ //SINCE I CAN USE ATTRIBUTES OF SG LIKE THIS -> NO NEED FOR A HIDDEN PROPERTY ANYMORE

        $message = request()->validate([
            'text' => 'required',
        ]);

        $message["studygroup_id"] = $studygroup->id;
        $user = auth()->user();
        // dd($user);
        // notifications
        // dd($message);
        $studygroupMembers = $studygroup->members->whereNotIn("id", auth()->user()->id);
        $studygroupMembers->each->notify(new StudychatNotification($studygroup, $message, $user));
        
        auth()->user()->studychats()->create($message);
        return redirect("/studygroup/{$studygroup->id}/study-chat");
    }

    public function delete(Studygroup $studygroup){ //SINCE I CAN USE ATTRIBUTES OF SG LIKE THIS -> NO NEED FOR A HIDDEN PROPERTY ANYMORE

        $data = request()->all();
        // $studygroup = $data["studygroup_id"]; 
        $studychat = $data["studychat"];
        $studychat_data = \App\Models\Studychat::find($studychat);
        $studychat_data->delete();
        return redirect("/studygroup/$studygroup->id/study-chat");

    }
}
