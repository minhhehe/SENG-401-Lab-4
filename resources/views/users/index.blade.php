@extends('layouts.subpage')

@section('page_title')
  System Users
@endsection

@section('subtitle')
  View and edit users
@endsection

@section('content')
  <nav class="navbar navbar-light bg-light">

  @foreach ($users as $user)
  <ul class="navbar-nav">
      <nav class="navbar navbar-expand-sm navbar-light bg-light">
        <ul class="navbar-nav">
          <li><a class="nav-item" href="/users/{{ $user->id }}/edit"><button type="button" class="btn">Edit</button></a></li>
          <li class="nav-item"><a class="nav-link" href="{{ action('UsersController@show', [$user->id])}}"> {{ $user->email}} </a></li>
        </ul>
      </nav>
  </ul>
  <div class="h-divider"></div>
  @endforeach

  </nav>

@stop
