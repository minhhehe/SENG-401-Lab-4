@extends('layouts.userhome')

@section('user_identifier')
 {{ $user->email }}
@endsection

@section('home_menu')
  <a href="/books"> View all books </a>
@endsection
