@extends('layouts.app')

@section('content')

<div  class="container">   
    <div class="row justify-content-center">
        
        
        <div class="col-md-8">
            
            <div class="card">
                <div class="card-header"><b>chatON</b></div>
                <div class="card-body">
                    <form action="/studygroup/{{$studygroup->id}}/study-chat/text-posted" method="POST">
                        @csrf
                        {{-- <input type="hidden" name="studygroup_id" value="{{$studygroup->id}}"> -- SINCE I LEARNT THAT I CAN USE MODEL ITSELF, NO NEED! --}}
                        <textarea id="text" name="text" rows="4" cols="50" placeholder="What's on your mind?"></textarea>
                        <input type="submit" value="Submit">
                    </form>
                </div>
            </div>
            
            <div class="card">
                <div class="card-header"><b>Chat Section // {{$studygroup->name}}</b></div>
                <div class="card-body">
                    @foreach($studygroup->studychats->reverse() as $studychat)
                        <div class="card">
                            <h6><b>By: {{\App\Models\User::find($studychat->user_id)->name}}</b></h6>
                            <h6>date: {{$studychat->created_at}}</h6>
                            <hr>
                            <p style="border:1px blue solid; padding:4px; border-radius:15px; word-wrap: break-word;"><b>Message:</b> {{$studychat->text}}</p>
                            @if(auth()->user()->id == $studychat->user_id)
                            <form action="/studygroup/{{$studygroup->id}}/study-chat/delete-message" method="POST">
                                @csrf
                                <input type="hidden" name="studygroup_id" value="{{$studygroup->id}}">
                                <input type="hidden" name="studychat" value="{{$studychat->id}}">
                                <input type="submit" value="deleteMessage" style="color:red; width:fit-content">
                            </form>
                            
                            @endif
                        </div>
                    @endforeach
                </div>
            </div>
            
        </div>
    </div>
</div>


@endsection

