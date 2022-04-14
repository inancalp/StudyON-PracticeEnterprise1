@extends('layouts.app')

@section('content')

<div  class="container">   
    <div class="row justify-content-center">
        
        
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><b>Question list for studygroup: {{$studygroup->name}}, course_id: {{$course->id}}</b></h5></div>
                <div class="card-body">
                    @foreach($studygroup->members->first()->questions as $question)
                        @if ($question->course_id == $course->id)
                            <p>question course_id = "{{$question->course_id}}"</p>
                        @endif
                    @endforeach
                </div>
            </div>
            
        </div>
    </div>
</div>


@endsection
