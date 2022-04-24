@extends('layouts.app')

@section('content')

<div  class="container">   
    <div class="row justify-content-center">
        
        
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><b>Add Course to <h1>{{$studygroup->name}}, ID: {{$studygroup->id}}</h1></b></div>
                <div class="card-body">
                    @if(auth()->user()->id == $studygroup->user_id)
                        {{-- FORM ACTION SHOULD ALSO ASSIGN 'user_id' 'is_admin' --}}
                        <form action="{{route('course.store')}}" method="POST"> 
                            @csrf
                            <div class="card">
                                <label>Title: </label>
                                {{-- GOOD PRACTICE OF ERROR TO INFORM USER --}}
                                <input type="text" name="title" class="form-control{{$errors->has("title") ? " is-invalid" : ""}}">
                                <input type="hidden"  name="hidden" value="{{$studygroup->id}}">
                                

                                @if ($errors->has("title"))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{$errors->first("title")}}</strong>
                                    </span>
                                @endif    
                            </div>
                            <div class="card">
                                <button type="submit" name="submit" value="submit">add the course</button>
                            </div>

                        </form>
                    @else
                        <p>No rights to add Course</p>
                    @endif
                </div>
            </div>
            
        </div>
    </div>
</div>


@endsection
