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


                                                    {{-- WHERE QUESTIONS ARE HAVING PLACE --}}
                                                    {{-- Radio Buttons shoul have same name and different ids!! --}}
                                                    <input type="hidden" name="question_id" value="{{$question->id}}">
                                                    <input type="hidden" name="studygroup_id" value="{{$studygroup->id}}">

                                                    <div class="card"><p>
                                                        <b><u>Q)</u></b> <br> {{$question->asked_question}}</p>
                                                    </div>
                                                    
                                                    <div class="card">
                                                        <b>A)</b>
                                                        <label for="answer_a">{{$question->answer_a}}</label>
                                                        <input type="radio" name="answer" value="answer_a">
                                                    </div>

                                                    <div class="card">
                                                        <b>B)</b>
                                                        <label for="answer_b">{{$question->answer_b}}</label>
                                                        <input type="radio" name="answer" value="answer_b">
                                                    </div>

                                                    <div class="card">
                                                        <b>C)</b>
                                                        <label for="answer_c">{{$question->answer_c}}</label>
                                                        <input type="radio" name="answer" value="answer_c">
                                                    </div>
                                                    
                                                    <div class="card">
                                                        <b>D)</b>
                                                        <label for="answer_d">{{$question->answer_d}}</label>
                                                        <input type="radio" name="answer" value="answer_d">
                                                    </div>
                                                    <input type="submit" name="submit" value="submit">


                                                </div>
                                                <hr>
                                            @endif
                                        @endif    
                                    @endif
                                @endforeach
                            @endforeach
                            
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
