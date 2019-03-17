@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>
                   Welcome Mr. {{$user->email}}(lol)

                   Here are what you can do:

                  <a href="/books"> View all your books </a>

                  <a href="/authors"> View alllll the authors </a>


                  <a href="/{{$user->id}}/books/">View all the books you have subscribed</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
