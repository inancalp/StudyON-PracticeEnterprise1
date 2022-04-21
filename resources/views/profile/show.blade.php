@extends('layouts.app')

@section('content')

<div style="margin-top: 10px;" class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><b>Profile to See</b></div>

                <div class="card-body">
                    <p><b>Profile Picture</b></p>
                    <img style="width:100px; border-radius:50%;"src="/png/logo2.png" alt="">
                    <hr>
                </div>
                <div class="card-body">
                    <p><b>userName</b></p>
                    {{ $user->username }}
                    <hr>
                </div>
                <div class="card-body">
                    <p><b>nameSirname</b></p>
                    {{ $user->name }}
                    <hr>
                </div>
                <div class="card-body">
                    <p><b>eMail</b></p>
                    {{ $user->email }}
                    <hr>
                </div>
                <div class="card-body">
                    <p><b>Description</b></p>
                    {{ $user->profile->description ?? "N/A"}}
                    <form action="#" method='POST'>
                        @csrf
                        <label>Change Description</label><br>
                    </form>
                    <hr>
                </div>
                <div class="card-body">
                    <p><b>Study Groups</b></p>
                    <li style="list-style-type: none; margin-top:10px;">
                        @foreach($user->member_of as $studygroup)
                            <ul><a href="#">{{$studygroup->name}}</a></ul>
                        @endforeach

                    </li>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
