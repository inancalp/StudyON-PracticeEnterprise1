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

                @if (auth()->user()->member_of->contains("id", "$studygroup->id")) 

                    @if ($studygroup->user_id == auth()->user()->id)
                        <div class="card-body">
                            <a href="/studygroup/{{$studygroup->id}}/course/create">Add a Course</a>
                        </div>
                    
                    @endif

                    <div class="card-body">
                        <a href="#">QuizON</a>
                        <p>will be a dropdownlist that will show the courses!</p>
                    </div>
                    
                    <div class="card-body">
                        <div class="dropdown mt-3">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="quizon-dropdown" data-bs-toggle="dropdown">
                                QuizON
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="quizon-dropdown">
                                {{-- this is where with foreach and if statements that i will put the question for the user! --}}
                            </ul>
                        </div>
                    </div>
                   








                    <div class="card-body">
                        {{-- NEED TO MAKE COURSE INDEX PAGE N' STUFF --}}
                        
                        <p><b>Add Question:</b></p>

                        @foreach($studygroup->courses as $course)
                        <div> <a href="/studygroup/{{$studygroup->id}}/course/{{$course->id}}/create">{{$course->title}}</a></div>
                        @endforeach
                        courses will go directly to quiz scenerio
                    </div>
                    
                    <div class="card-body">
                        <a href="#">Spaced Repetition</a>
                        <p>there will be the questions that user pick during the quiz</p>
                    </div>

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