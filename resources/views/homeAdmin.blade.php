@extends('layouts.userhome')

<!-- @section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>
                   Welcome Mr. Admin(lol)

                   Here are what you can do:

                  <a href="/books"> View alllll the books </a>
                  <a href="/books/create"> Create a new book </a>
                  </br>
                  <a href="/subscriptions"> View alllll the subscriptions </a>
                  <a href="/subscriptions/create"> Subscribe a user to a book </a>
                  </br>
                  <a href="/authors"> View alllll the authors </a>
                  <a href="/authors/create"> Add a new author to the database </a>
                  </br>
                  <a href="/users"> View alllll the users </a>
                  </br>
                  <a href="/{{$user->id}}/books/">View all the books you have subscribed</a>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection -->

@section('home_menu')
  <a href="/books"> View alllll the books </a>
  <a href="/books/create"> Create a new book </a>
  </br>
  <a href="/subscriptions"> View alllll the subscriptions </a>
  <a href="/subscriptions/create"> Subscribe a user to a book </a>
  </br>
  <a href="/authors"> View alllll the authors </a>
  <a href="/authors/create"> Add a new author to the database </a>
  </br>
  <a href="/users"> View alllll the users </a>
  </br>
  <a href="/{{$user->id}}/books/">View all the books you have subscribed</a>
@endsection
