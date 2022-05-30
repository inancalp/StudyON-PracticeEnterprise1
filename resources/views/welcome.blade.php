@extends('layouts.app')

@section('content')

<div style="margin-top: 10px;" class="container">
    <div class="row justify-content-center">
        <div class="mainLogo"></div>
        <div class="col-md-8">
            <div class="card">
                <img style="border: solid 1px black; padding-bottom:20px;" src="/svg/logo1.1.svg" alt="">
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
                        <a id="studygroupLinks" class="card-link link-dark" href="/studygroup/{{$studygroup->id}}">{{$studygroup->name}}</a>
                    </div>
                @endforeach  
            </div>   
        </div>
    </div>
</div>
@endsection

<style>

#studygroupLinks{
    text-decoration: none;
    background-color:lightblue;
    border-radius:25px;
    padding:4px;
    transition: all 0.3s ease 0s;
}

#studygroupLinks:hover{
    color: blue;
}
a{  
    transition: all 0.3s ease 0s;
}

</style>
