@extends('layouts.app')

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

@endsection