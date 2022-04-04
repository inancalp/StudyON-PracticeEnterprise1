@extends('layouts.app')

@section('content')

<div  class="container">   
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><b>Study Groups</b></div>
                @foreach($studygroups as $studygroup)
                    <div class="card-body">
                        <a class="card-link" href="/studygroup/{{$studygroup->id}}">{{$studygroup->name}}</a>
                    </div>
                @endforeach  
            </div>   
        </div>
    </div>
</div>



@endsection