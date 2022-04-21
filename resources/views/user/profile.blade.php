@extends('layouts.app')

@section('content')

<div style="margin-top: 10px;" class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><b>Profile with Auth::user() Command</b></div>

                <div class="card-body">
                    <p><b>Profile Picture</b></p>
                    <img style="width:100px; border-radius:50%;"src="/png/logo2.png" alt="">
                    <hr>
                </div>
                <div class="card-body">
                    <p><b>userName</b></p>
                    {{ Auth::user()->username }}
                    <hr>
                </div>
                <div class="card-body">
                    <p><b>nameSirname</b></p>
                    {{ Auth::user()->name }}
                    <hr>
                </div>
                <div class="card-body">
                    <p><b>eMail</b></p>
                    {{ Auth::user()->email }}
                    <hr>
                </div>
                <div class="card-body">
                    <p><b>Description</b></p>
                    {{ Auth::user()->profile->description ?? "N/A"}}
                    
                    <hr>
                </div>
                {{-- STUCK HERE! --}}
                <div class="card-body">
                    <p><b>Statistics</b></p>
                    @foreach(auth()->user()->member_of as $studygroup)
                        <hr>
                        <p><b>SG NAME:</b> {{"$studygroup->name"}}</p>
                        <p><b>SG ID:</b> {{"$studygroup->id"}}</p>
                        <p><b>Score for "{{$studygroup->name}}" -> </b>{{auth()->user()->scores->where("studygroup_id", $studygroup->id)->first()->score}}</p>
                        
                        {{-- FIRST IS NECESSARY --}}
                        <b>auth()->user()->scores: </b> <p>{{auth()->user()->scores}}</p>
                        <hr>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
