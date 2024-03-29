@extends('layouts.app')

@section('content')

<div  class="container">   
    <div class="row justify-content-center">
        
        
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><b>Question for:<h5><b>{{$course->title}}</b></h5> Study Group: <h5><b>{{$studygroup->name}}</b></h5></div>
                <div class="card-body">
                    
                    {{-- NEED MIDDLEWARE TO STOP ANY OTHER USER TO BE ABLE TO INPUT QUESTION --}}
                    {{-- FORM ACTION SHOULD ALSO ASSIGN 'user_id' 'is_admin' --}}
                    @if(auth()->user()->member_of->contains("id", "$studygroup->id"))


                            {{-- ALT --}}
                            {{-- "/studygroup/{{$studygroup->id}}/course/{{$course->id}}/question/create/created" --}}
                        <form action="{{route("question.store")}}" method="POST"> 
                            @csrf
                            <input type="hidden"  name="studygroup_id" value="{{$studygroup->id}}">
                            <input type="hidden"  name="course_id" value="{{$course->id}}">
                            {{-- <div class="card">
                                <input type="hidden"  name="course_id" value="{{$course->id}}">
                                <input type="hidden"  name="studygroup_id" value="{{$studygroup->id}}">
                                course->id = {{$course->id}}
                                <br>
                                studygroup->id = {{$course->id}}
                            </div> --}}

                            {{-- <div class="card">
                                
                                studygroup->id = {{$studygroup->id}}
                            </div> --}}
                            
                            <div class="card">
                                <label>Question</label>
                                <textarea name="asked_question" cols="30" rows="5"></textarea>
                            </div>
                            
                            <div class="card">
                                <label>Answer -A-</label>
                                <textarea name="answer_a" cols="20" rows="2"></textarea>
                            </div>
                            <div class="card">
                                <label>Answer -B-</label>
                                <textarea name="answer_b" cols="20" rows="2"></textarea>
                            </div>
                            <div class="card">
                                <label>Answer -C-</label>
                                <textarea name="answer_c" cols="20" rows="2"></textarea>
                            </div>
                            <div class="card">
                                <label>Answer -D-</label>
                                <textarea name="answer_d" cols="20" rows="2"></textarea>
                            </div>
                            <div class="card">
                                <label>Correct Answer</label>
                                <textarea name="correct_answer" cols="20" rows="2"></textarea>
                            </div>
                            <div class="card">
                                <button type="submit" name="submit" value="submit">add the question</button>
                            </div>
                                
                        </form>
                    @else
                        <div class="card">
                            <p>You are not a member of the study group!</p>
                        </div>
                    @endif
                    
                </div>
            </div>
            
        </div>
    </div>
</div>


@endsection
