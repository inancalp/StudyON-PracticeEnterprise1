@extends('layouts.app')

@section('content')

<div  class="container">   
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><b>QuestionBank</b></h5></div>
                <div class="card-body">
                    @forelse($studygroup->bank_questions as $question)
                        <div class="card">
                            <b>Question with ID: {{$question->id}}</b>
                            <p>{{$question->question}}</p>
                            <input type="hidden" id="correct_answer{{$question->id}}" value="{{$question->correct_answer}}">
                            <input type="button" name="button" value="Show Answer" onclick="show_answer({{$question->id}})">
                            <p id="answer{{$question->id}}"></p>
                        </div>
                    @empty
                        <div class="card">
                            <p>THERE ARE NO QUESTIONS AVAILABLE YET!</p>
                        </div>
                    @endforelse
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