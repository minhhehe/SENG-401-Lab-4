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

@endsection
