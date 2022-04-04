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
                    {{ Auth::user()->profile->description}}
                    <form action="#" method='POST'>
                        @csrf
                        <label>Change Description</label><br>
                        <textarea style="width:300px; height:50px; margin-top:2px;" name="description"></textarea>
                    </form>
                    <hr>
                </div>
                <div class="card-body">
                    <p><b>Statistics</b></p>
                    <li style="list-style-type: none; margin-top:10px;">
                        <ul>SpacedREP Comleted = ""</ul>
                        <ul>StudyGroup Rating = ""</ul>
                    </li>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
