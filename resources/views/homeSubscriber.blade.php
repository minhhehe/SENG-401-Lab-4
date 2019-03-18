@extends('layouts.userhome')

@section('user_identifier')
 {{ Auth::user()->email }}
@endsection

@section('home_menu')

<nav class="navbar navbar-light bg-light">
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" href="/books"> View all your books </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="/authors"> View alllll the authors </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="/{{$user->id}}/books/">View all the books you have subscribed</a>
    </li>
  </ul>
</nav>

@endsection
