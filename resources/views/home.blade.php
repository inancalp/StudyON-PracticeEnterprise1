@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div>
<div style="margin-top: 10px;" class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><b>Profile</b></div>

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
                    <textarea></textarea>
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
