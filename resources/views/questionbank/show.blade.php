@extends('layouts.app')

@section('content')

<div  class="container">   
    <div class="row justify-content-center">
        
        
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><b>QuestionBank</b></h5></div>
                <div class="card-body">



                    {{-- @foreach --}}
                            <div class="card">
                                Hello, World! {{$studygroup}}
                            </div>
                    {{-- @endforeach --}}



                </div>
            </div>
            
        </div>
    </div>
</div>

@endsection