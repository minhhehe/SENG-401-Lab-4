@extends('layouts.subpage')

@section('page_title')
  Your Subscriptions
@endsection

@section('subtitle')
  Subscription list for user: {{$user->email}}
@endsection

@section('content')
<nav class="navbar navbar-light bg-light">

@foreach ($books as $book)
<ul class="navbar-nav">
    <nav class="navbar navbar-expand-sm navbar-light bg-light">
      <ul class="navbar-nav">

          <a class="nav-link" href='/books/{{$book->id}}'> {{$book->name}} </a>

    </ul>
  </nav>
</ul>
<div class="h-divider"></div>
@endforeach

<!-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>
                   Welcome Mr. {{$user->email}}(lol)

                   Here are books you have been subscribed to:


                  @foreach ($books as $book)
                    <a href='/books/{{$book->id}}'> {{$book->name}} </a>
                  @endforeach
                </div>
            </div>
        </div>
    </div>
</div> -->
@endsection
