@extends('layouts.app')

@section('content')

<div style="margin-top: 10px;" class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h5><b><u>myProfile</u></b></h5></div>

                <div class="card-body">
                    <p><b>Profile Picture</b></p>
                    <img style="width:100px; border-radius:50%;"src="/png/logo2.png" alt="">
                    <hr>
                </div>
                <div class="card-body">
                    <h5><b><u>Username</u></b></h5>
                    {{ Auth::user()->username }}
                    <hr>
                </div>
                <div class="card-body">
                    <h5><b><u>Name</u></b></h5>
                    {{ Auth::user()->name }}
                    <hr>
                </div>
                <div class="card-body">
                    <h5><b><u>E-mail</u></b></h5>
                    {{ Auth::user()->email }}
                    <hr>
                </div>
                <div class="card-body">
                    <h5><b><u>Description</u></b></h5>
                    {{ Auth::user()->profile->description ?? "N/A"}}
                    
                    <hr>
                </div>
                {{-- STUCK HERE! --}}
                <div class="card-body">
                    <h5><b><u>Statistics</u></b></h5>
                    @foreach(auth()->user()->member_of as $studygroup)
                        <div class="card">
                            <p><u>Study Group</u> -> <b>{{"$studygroup->name"}}</b></p>
                            <p><u>Score</u> -> <b>{{auth()->user()->scores->where("studygroup_id", $studygroup->id)->first()->score}}</b></p>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
