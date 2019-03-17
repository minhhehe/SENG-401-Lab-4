@extends('layouts.userhome')

@section('user_identifier')
 {{ Auth::user()->email }}
@endsection

@section('home_menu')
<a href="/books"> View all your books </a>
<a href="/authors"> View alllll the authors </a>
<a href="/{{$user->id}}/books/">View all the books you have subscribed</a>
@endsection
