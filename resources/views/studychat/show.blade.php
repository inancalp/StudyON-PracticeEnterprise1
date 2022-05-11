@extends('layouts.app')

@section('content')

<div  class="container">   
    <div class="row justify-content-center">
        
        
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><b>StudyCHAT for ---studygroup->name---</b></h5></div>
                <div class="card-body">
                    @foreach(auth()->user()->repeat_questions as $repeat_question)
                        @if($repeat_question->medium == "1")
                            <div class="card">
                                <b>Question:</b>
                                <p>{{$repeat_question->question}}</p>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
            
        </div>
    </div>
</div>


@endsection