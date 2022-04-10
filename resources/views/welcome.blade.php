@extends('layouts.app')

@section('content')

<div style="margin-top: 10px;" class="container">
    <div class="row justify-content-center">
        <div class="mainLogo"></div>
        <div class="col-md-8">
            <div class="card">
                <img style="padding-bottom:20px;" src="/svg/logo1.1.svg" alt="">
            </div>   
        </div>
    </div>
</div>

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
