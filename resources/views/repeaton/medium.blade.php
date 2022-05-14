@extends('layouts.app')

@section('content')

<div  class="container">   
    <div class="row justify-content-center">
        
        
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><b>Medium Questions for {{auth()->user()->name}}</b></h5></div>
                <div class="card-body">
                    
                    @foreach(auth()->user()->repeat_questions as $question)
                        @if($question->medium == "1")
                            <div class="card">
                                <b>Question with ID: {{$question->id}}</b>
                                <p>{{$question->question}}</p>
                                <input type="hidden" id="correct_answer{{$question->id}}" value="{{$question->correct_answer}}">
                                <input type="button" name="button" value="Show Answer" onclick="show_answer({{$question->id}})">
                                <p id="answer{{$question->id}}"></p>
                                <a href="/repeat-on/move-question-easy/{{$question->id}}">Move question to "easies"</a>
                                <a href="/repeat-on/move-question-hard/{{$question->id}}">Move question to "hards"</a>
                            </div>
                        @endif
                    @endforeach

                </div>
            </div>
            
        </div>
    </div>
</div>



@endsection

<script>
    
    function show_answer(variable){

        var correct_answer = document.getElementById("correct_answer" + variable).value;
        return document.getElementById("answer" + variable).innerHTML = correct_answer;

    }

</script>