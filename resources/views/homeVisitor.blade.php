@extends('layouts.userhome')

@section('user_identifier')
 {{ Auth::user()->email }}
@endsection

@section('home_menu')

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="collapse navbar-collapse navbar-nav" id="viewAllBooksLink">
      <a class="nav-item nav-link" href="/books"> View all books </a>
  </div>
</nav>

@endsection
