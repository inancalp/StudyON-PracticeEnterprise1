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
                                <div> <a href="/studygroup/{{$studygroup->id}}/course/{{$course->id}}/question/create">{{$course->title}}</a></div>
                            @else
                                <p style="background-color: lightblue; border-radius:25px; width:fit-content; padding:4px;"> <b>{{$course->title}}</b> -> You have added a question for this week.</p>
                            @endif
                        @endforeach
                        courses will go directly to quiz scenerio
                    </div>
                    <hr>

                    <div class="card-body">
                        <a href="#">StudyCHAT</a>
                        <p>regular chat room</p>
                    </div>

                    <div class="card-body">
                        <a href="#">Question Bank</a>
                        <p>regular chat room</p>
                    </div>

                    <div class="card-body">
                        <p><b>Group Members:</b></p>
                        @foreach($studygroup->members as $member)
                        <div> <a href="/user/profile/{{$member->id}}">{{$member->name}}</a></div>
                        @endforeach
                        <p>group members will be actually a scoreboard with user profile link and it's score on the studygroup!</p>
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