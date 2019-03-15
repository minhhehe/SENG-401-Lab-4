@extends('welcome')

@section('content')
  <h1> Users Page </h1>


  <div class="container_big">
  @foreach ($users as $user)
    <article>
        <a href="{{ action('UsersController@show', [$user->id])}}"> {{ $user->email}} </a>
        <p>
          <a href="/$user/{{ $user->id }}/edit"> Edit this record </a>
        </p>
    </article>
  @endforeach
  </div>

@stop
