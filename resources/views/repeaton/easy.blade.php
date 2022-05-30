{{-- @extends('layouts.app')

@section('content')

<div  class="container">   
    <div class="row justify-content-center">
        
        
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><b>Medium Questions for {{auth()->user()->name}}</b></h5></div>
                <div class="card-body">
                    
                    @foreach(auth()->user()->repeat_questions as $repeat_question)
                        @if($repeat_question->easy == "1")
                            <div class="card">
                                <b>Question with ID: {{$repeat_question->id}}</b>
                                <p>{{$repeat_question->question}}</p>
                                <a href="#">Go to answer</a>
                                <a href="/repeat-on/move-question-medium/{{$repeat_question->id}}">Move question to "medium"</a>
                                <a href="/repeat-on/move-question-hard/{{$repeat_question->id}}">Move question to "hards"</a>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
            
        </div>
    </div>
</div>

@endsection --}}

@extends('layouts.app')

@section('content')

<div  class="container">   
    <div class="row justify-content-center">
        
        
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><b>Easy Questions for {{auth()->user()->name}}</b></h5></div>
                <div class="card-body">
                    @php ($i = 0)
                    @foreach(auth()->user()->repeat_questions as $question)
                        @if($question->easy == "1")
                            @php ($i += 1)
                            <div class="card">
                                {{-- <b>Question with ID: {{$question->id}}</b> --}}
                                <b>{{$question->question}}</b>
                                <input type="hidden" id="correct_answer{{$question->id}}" value="{{$question->correct_answer}}">
                                <input type="button" name="button" value="Show Answer" onclick="show_answer({{$question->id}})">
                                <b style="text-align:center; padding:4px; margin-top:4px; border-radius:15px;"id="answer{{$question->id}}"></b>
                                <a style="text-align:center; padding:4px;" href="/repeat-on/move-question-medium/{{$question->id}}">Move question to "mediums"</a>
                                <a style="text-align:center; padding:4px;" href="/repeat-on/move-question-hard/{{$question->id}}">Move question to "hards"</a>
                            </div>
                        @endif
                    @endforeach

                    @if ($i == 0)
                        <h5 style="background-color: lightblue; border-radius:25px; padding:4px; width:fit-content;">NO QUESTION AVAILABLE</h5>
                    @endif

                </div>
            </div>
            
        </div>
    </div>
</div>



@endsection

<script>
    
    function show_answer(variable){

        var correct_answer = document.getElementById("correct_answer" + variable).value;
        var answerPar = document.getElementById("answer" + variable);
        answerPar.style.backgroundColor = "lightblue";
        return answerPar.innerHTML = correct_answer;

    }

</script>