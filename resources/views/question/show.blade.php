@extends('layouts.app')

@section('content')

<div  class="container">   
    <div class="row justify-content-center">
        
        
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><b>QuizON! - {{$studygroup->name}}, {{$course->title}}</b></h5></div>
                <div class="card-body">
                    @if (auth()->user()->member_of->contains("id", "$studygroup->id"))
                        @php ($i = 0)
                        {{-- <p>i = {{$i}}</p>   --}}
                            @foreach($studygroup->members as $member)
                                @foreach($member->questions as $question)   
                                    @if ($question->course_id == $course->id)
                                        @if($question->id != auth()->user()->solved_questions->contains("id", "$question->id"))
                                            @if($question->user_id != auth()->user()->id)
                                            @php ($i += 1)
                                                <div class="card">
                                                    {{-- <form onsubmit="return verify({{$question->id}})" action="#"> --}}
                                                    {{-- <form onsubmit="return verify()" action="{{route('question.solved')}}" method="POST"> --}}
                                                    <form onsubmit="return verify({{$question->id}})" action="/question-solved" method="POST">
                                                        @csrf
                                                        {{-- WHERE QUESTIONS ARE HAVING PLACE --}}
                                                        {{-- Radio Buttons shoul have same name and different ids!! --}}
                                                        <input type="hidden" name="question_id" value="{{$question->id}}">
                                                        <input type="hidden" name="studygroup_id" value="{{$studygroup->id}}">
                                                        <input type="hidden" name="course_id" value="{{$course->id}}">
                                                        <div class="card">
                                                            <b>Question by:
                                                                <span style="background-color:lightblue; border-radius:25px; padding-right:4px; padding-left:4px;">
                                                                {{App\Models\User::find($question->user_id)->name}}
                                                                </span>
                                                            </b>
                                                            {{-- <p>Question ID -> {{$question->id}}</p> --}}
                                                        </div>
                                                        <div class="card"><p>
                                                            <input type="hidden" name="question" value="{{$question->asked_question}}">
                                                            <b><u>Question)</u></b> <br> {{$question->asked_question}}</p>
                                                        </div>
                                                        
                                                        <div class="card">
                                                            <b>A)</b>
                                                            <label for="answer_a">{{$question->answer_a}}</label>
                                                            <input type="radio" class="answer{{$question->id}}" name="answer" value="answer_a">
                                                        </div>

                                                        <div class="card">
                                                            <b>B)</b>
                                                            <label for="answer_b">{{$question->answer_b}}</label>
                                                            <input type="radio" class="answer{{$question->id}}" name="answer" value="answer_b">
                                                        </div>

                                                        <div class="card">
                                                            <b>C)</b>
                                                            <label for="answer_c">{{$question->answer_c}}</label>
                                                            <input type="radio" class="answer{{$question->id}}" name="answer" value="answer_c">
                                                        </div>
                                                        
                                                        <div class="card">
                                                            <b>D)</b>
                                                            <label for="answer_d">{{$question->answer_d}}</label>
                                                            <input type="radio" class="answer{{$question->id}}" name="answer" value="answer_d">
                                                        </div>
                                                        <br>
                                                        <div style="border:2px black solid;"class="card">
                                                            <label for="spacedrep"><b>add question to repeatON!</b></label>
                                                            <input type="checkbox" name="spacedrep" value="true">
                                                        </div>
                                                       <br>
                                                        <div style="border:none;" class="card">
                                                            <input type="submit" name="submit" value="submit">
                                                        </div>
                                                    </form>
                                                </div>
                                                {{-- <hr style="border:5px solid blue; outline:5px solid black; margin-top:24px; margin-bottom:24px;"> --}}
                                            @endif
                                        @endif    
                                    @endif
                                @endforeach
                            @endforeach
                               
                            @if ($i == 0)
                                {{-- <p>i = {{$i}}</p>  --}}
                                <h5 style="background-color: lightblue; border-radius:25px; padding:4px; width:fit-content;">NO AVAILABLE QUESTION</h5>
                            @endif
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
<script>

    function verify(question_id){

        var anyAnswer = document.getElementsByClassName(`answer${question_id}`);
        ifChecked = [
            anyAnswer[0].checked,
            anyAnswer[1].checked,
            anyAnswer[2].checked,
            anyAnswer[3].checked,
        ]
        
        var findAnswer = ifChecked.find(element => element == true);
        console.log(findAnswer);
        
        if (!findAnswer){
            console.log("Returns False");
            return false;
        }
        else{
            console.log("Returns True");
            // return false;
        }
       
    }

</script>