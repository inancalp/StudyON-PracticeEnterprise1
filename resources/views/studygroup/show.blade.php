@extends('layouts.app')

@section('content')

<div  class="container">   
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                
                <div class="card-header">
                    Study Group: <b>{{$studygroup->name}}</b>
                </div>

                <div class="card-body">
                    <p>Description <b>{{$studygroup->description}}</b></p>
                </div>
                @if (auth()->user()->member_of->contains("id", "$studygroup->id")) 

                    @if ($studygroup->user_id == auth()->user()->id)
                        <div class="card-body">
                            <a href="/studygroup/{{$studygroup->id}}/course/create">Add a Course</a>
                        </div>
                    
                    @endif
                    

                    <div class="card-body">
                        {{-- NEED TO MAKE COURSE INDEX PAGE N' STUFF --}}
                        <p><b>Courses:</b></p>
                        @foreach($studygroup->courses as $course)
                        <div> <a href="/studygroup/course/{{$course->id}}">{{$course->title}}</a></div>
                        @endforeach
                    </div>

                    <div class="card-body">
                        <p><b>Group Members:</b></p>
                        @foreach($studygroup->members as $member)
                        <div> <a href="/user/profile/{{$member->id}}">{{$member->name}}</a></div>
                        @endforeach
                    </div>
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


@endsection