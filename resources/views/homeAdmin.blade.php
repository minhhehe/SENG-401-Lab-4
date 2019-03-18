@extends('layouts.userhome')

@section('user_identifier')
 {{ Auth::user()->email }}
@endsection

@section('home_menu')
<nav class="navbar navbar-light bg-light">
  <ul class="navbar-nav">
    <li class="nav-item">
      <nav class="navbar navbar-expand-sm navbar-light bg-light">
        <ul class="navbar-nav">
          <li class="nav-item"><a class="nav-link" href="/books"> View all books </a></li>
          <li><div class="v-divider"></div></li>
          <li class="nav-item"><a class="nav-link" href="/books/create"> Create a new book </a></li>
        </ul>
      </nav>
    </li>

    <div class="h-divider"></div>

    <li class="nav-item">
      <nav class="navbar navbar-expand-sm navbar-light bg-light">
        <ul class="navbar-nav">
          <li class="nav-item"><a class="nav-link" href="/subscriptions"> View all subscriptions </a></li>
          <li><div class="v-divider"></div></li>
          <li class="nav-item"><a class="nav-link" href="/subscriptions/create"> Subscribe a user to a book </a></li>
          <li><div class="v-divider"></div></li>
          <li class="nav-item"><a class="nav-link" href="/{{$user->id}}/books/">View your subscriptions</a></li>
        </ul>
      </nav>
    </li>

    <div class="h-divider"></div>

    <li class="nav-item">
      <nav class="navbar navbar-expand-sm navbar-light bg-light">
        <ul class="navbar-nav">
          <li class="nav-item"><a class="nav-link" href="/authors"> View all authors </a></li>
          <li><div class="v-divider"></div></li>
          <li class="nav-item"><a class="nav-link" href="/authors/create"> Add a new author to the database </a></li>
        </ul>
      </nav>
    </li>

    <div class="h-divider"></div>

    <li class="nav-item">
      <nav class="navbar navbar-expand-sm navbar-light bg-light">
        <ul class="navbar-nav">
          <li class="nav-item"><a class="nav-link" href="/users"> View all users </a></li>
        </ul>
      </nav>
    </li>

    <div class="h-divider"></div></li>

    <li class="nav-item">
      <nav class="navbar navbar-expand-sm navbar-light bg-light">
        <ul class="navbar-nav">
          <li class="nav-item"><a class="nav-link" href="/{{$user->id}}/books/">View your subscriptions</a></li>
          <li class="nav-item nav-link">|</li>
          <li class="nav-item"><a class="nav-link" href="/books/create"> Create a new book </a></li>
        </ul>
      </nav>
    </li>
  </ul>
</nav>
@endsection
