@extends('layouts.app')

@section('content')

<div  class="container">   
    <div class="row justify-content-center">
        
        
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><b>Create Study Group</b></div>
                <div class="card-body">
                    
                    {{-- FORM ACTION SHOULD ALSO ASSIGN 'user_id' 'is_admin' --}}
                    <form action="#" method="POST"> 
                        @csrf
                        <div class="card">
                            <label>Name:</label>
                            <input type="text" name="name">
                        </div>
                        <div class="card">
                            <label>Password:</label>
                            <input type="password" name="password">
                        </div>
                        <div class="card">
                            <label>Description:</label>
                            <textarea name="description" id="" cols="30" rows="10"></textarea>
                        </div>
                        <div class="card">
                            <button type="submit" name="submit" value="submit">sendIT</button>
                        </div>

                    </form>
                    
                </div>
            </div>
            
        </div>
    </div>
</div>


@endsection
