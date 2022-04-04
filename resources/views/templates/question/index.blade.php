@extends('layouts.app')

@section('content')

<div style="margin-top: 10px;" class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <b>Hello {{ $user_->username }}</b>
                </div>
                <div class="card-body">
                    <a href="#">Add a question</a>
                </div>
                <div style="background-color: rgb(244, 244, 244);" class="card-body">
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
