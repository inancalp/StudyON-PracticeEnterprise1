@extends('layouts.app')

@section('content')

<div  class="container">   
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Study Group: <b>{{$studygroup->name}}</b></div>
                <div class="card-body">
                    <p>Description <b>{{$studygroup->description}}</b></p>
                </div>
                @if (auth()->user()->member_of->contains("id", "$studygroup->id")) 
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