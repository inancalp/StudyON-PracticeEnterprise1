@extends('layouts.app')

@section('content')

<div  class="container">   
    <div class="row justify-content-center">
        
        
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><b>Question list for studygroup: {{$studygroup->name}}, course_id: {{$course->id}}</b></h5></div>
                <div class="card-body">
                    @if (auth()->user()->member_of->contains("id", "$studygroup->id"))
                        <form action="{{route('question.solved')}}" method="POST">
                            @csrf
                            @foreach($studygroup->members as $member)
                                @foreach($member->questions as $question)   
                                    @if ($question->course_id == $course->id)
                                        @if($question->id != auth()->user()->solved_questions->contains("id", "$question->id"))
                                            @if($question->user_id != auth()->user()->id)
                                                <div class="card">
                                                    <p> question = {{$question->question}}</p>
                                                    <input type="hidden" name="question_id" value="{{$question->id}}">
                                                    <label for="course_id">question course_id = "{{$question->course_id}}"</label>
                                                    <input type="checkbox" name="course_id">
                                                </div>
                                            @endif
                                        @endif    
                                    @endif
                                @endforeach
                            @endforeach
                            <input type="submit" name="submit" value="submit">
                        </form>
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
</div>


@endsection
