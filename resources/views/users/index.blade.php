@extends('layouts.subpage')

@section('page_title')
  System Users
@endsection

@section('subtitle')
  View and edit users
@endsection

@section('content')
  <div class="">
  @foreach ($users as $user)
    <article>
        <a href="{{ action('UsersController@show', [$user->id])}}"> {{ $user->email}} </a>
        <p>
          <a href="/users/{{ $user->id }}/edit"> Edit this record </a>
        </p>
    </article>
  @endforeach
  </div>

@stop
