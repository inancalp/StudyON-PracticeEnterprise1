@extends('layouts.app')

@section('content')

<div  class="container">   
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                {{-- CONDITIONAL SO FAR SO GOOD! --}}
                @if (auth()->user()->member_of()->find($course->studygroup->id))  
                    <div class="card-header">
                        <h3>Course:</h3> <b>{{$course->title}}</b>
                    </div>
                    <div class="card-body">
                        
                        {{-- this is where questions will be visible --}}


                    </div>



                @else
                    <p><b>You are not a member of the StudyGroup</b></p>
                    <p>Please join the group before trying to see the course profile</p>
                @endif
            </div>
            
        </div>
    </div>
</div>


@endsection