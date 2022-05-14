@extends('layouts.app')

@section('content')

<div  class="container">   
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                
                <div class="card-header">
                    Study Group: <b>{{$studygroup->name}}</b>
                </div>

                <div class="card-body">
                    <p>Description <b>{{$studygroup->description}}</b></p>
                </div>
                <hr>
                @if (auth()->user()->member_of->contains("id", "$studygroup->id")) 
                    
                    @if ($studygroup->user_id == auth()->user()->id)
                        <div class="card-body">
                            <h5><b>Admin</b> -> {{auth()->user()->username}}</h5>
                            <a href="/studygroup/{{$studygroup->id}}/course/create">Add a Course</a>
                        </div>
                    @else
                        <div class="card-body">
                            <h5><b>User</b> -> {{auth()->user()->username}}</h5>
                            <p>No priviledge to add Course</p>
                        </div>
                    @endif
                    
                   
                    <hr>
                    <div class="card-body">
                        
                        <div class="dropdown mt-3">
                            <B>QuizON</B><br>
                            @foreach($studygroup->courses as $course)
                                {{-- UNTIL A WAY TO PASS PARAMETERS IN route('question.show') HREF WILL STAY LIKE THIS --}}
                                <a href="/studygroup/{{$studygroup->id}}/course/{{$course->id}}/questions" class="item">{{$course->title}}</a><br>
                            @endforeach
                            
                        </div>
                    </div>

                   <hr>
                    <div class="card-body">
                        {{-- NEED TO MAKE COURSE INDEX PAGE N' STUFF --}}
                        
                        <p><b>Add Question:</b></p>

                        @foreach($studygroup->courses as $course)
                            @if(!auth()->user()->questions->contains("course_id", $course->id))
                                <div> 
                                    <p>
                                      <span style="background-color: lightblue; border-radius:25px; width:fit-content; padding:4px;"> Good2Add :</span>  
                                        <a href="/studygroup/{{$studygroup->id}}/course/{{$course->id}}/question/create">{{$course->title}}</a>
                                    </p>
                                    
                                </div>
                            @else
                                <p style="background-color: lightblue; border-radius:25px; width:fit-content; padding:4px;"> <b>{{$course->title}}</b> -> You have added a question for this week.</p>
                            @endif
                        @endforeach
                        courses will go directly to quiz scenerio
                    </div>
                    
                    <hr>
                    <div class="card-body">
                        <a href="/studygroup/{{$studygroup->id}}/study-chat">StudyCHAT</a>
                        <p>regular chat room</p>
                    </div>
                    <hr>
                    <div class="card-body">
                        <a href="/studygroup/{{$studygroup->id}}/question-bank">Question Bank</a>
                    </div>
                    <hr>
                    <div class="card-body">
                        <p><b>Group Members:</b></p>
                        <hr>
                        @foreach($studygroup->members as $member)
                            <div>
                                <p> 
                                    <a href="/user/profile/{{$member->id}}">{{$member->name}}</a> 
                                    with score ->
                                    {{$member->scores->where("studygroup_id", $studygroup->id)->first()->score}}
                                </p>
                                <hr>
                            </div>
                        @endforeach
                       
                    </div>
                @else
                    <div class="card-body">
                        <form action="{{route('studygroup.join')}}" method="POST">
                            @csrf
                            <input type="hidden"  name="hidden" value="{{$studygroup->id}}">
                            <label for="password">Password-></label>
                            <input type="password" name="password">
                            <button>Join Group</button> 
                        </form>
                    </div>
                @endif

            </div>
            
        </div>
    </div>
</div>


@endsection