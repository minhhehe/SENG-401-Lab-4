@extends('welcome')

@section('content')
  <h1> User detail Page </h1>

  <user>

    <div class="field">
      <label class="label">User's email:</label>

      <b> {{ $user->email }}</b>

        <div>
          Education_field: {{ $user->education_field }}
        </div>
        <div>
          Birthday: {{ $user->birthday }}
        </div>
        <div>
          Role: {{ $user->role }}
        </div>

        <div>
          Books subscribed to:
          @foreach ($books as $book)
            <a href="/books/{{ $book->id }}"> {{$book->name}} </a>
          </br>
          @endforeach
        </div>

      </div>
  </user>

  <p>
    <a href="/users/{{ $user->id }}/edit"> Edit this user's record </a>
  </p>

  @include('error')
@stop
