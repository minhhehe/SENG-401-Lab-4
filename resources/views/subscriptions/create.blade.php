@extends('layouts.welcome')

@section('content')
  <h1>Subscribe a user to a book</h1>

  <hr/>

  <form method="POST" action="/subscriptions">
    {{ csrf_field() }}
    <div>
      <select name="user_id">
        @foreach ($users as $user)
          <option value="{{$user->id}}"> {{$user->email}} </option>
        @endforeach
      </select>

      <select name="book_id">
        @foreach ($books as $book)
          <option value="{{$book->id}}"> {{$book->name}} | {{ $book->isbn }} </option>
        @endforeach
      </select>
    </div>

    <div>
      <button type="submit">Subscribe</button>
    </div>

    @include('error')

@stop
