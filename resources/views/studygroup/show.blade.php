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
                <div class="card-body">
                    <p>Courses -DropDown List- ?? <b>FEATURE</b></p>
                </div>
                <div class="card-body">
                    <join-button studygroup-id="{{ $studygroup->id }}"></join-button>
                </div>
            </div>
            
        </div>
    </div>
</div>


@endsection