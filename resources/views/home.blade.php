@extends('layouts.app')

@section('content')

<div  class="container">   
    <div class="row justify-content-center">
        
        <div class="mainLogo"></div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div style="text-align: center" class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <p>You are logged in</p>
                    <p><b>{{Auth::user()->username}}</b></p>
                </div>
            </div>
            <div class="card">
                <h1 style="text-align: center; padding-top:15px; padding-left:15px; font-size:400%;">WELCOME TO</h1>
                <img style="padding-bottom:20px; width:50%; margin:auto;" src="/svg/logo1.1.svg" alt="">
            </div>   
        </div>
    </div>
</div>
@endsection
