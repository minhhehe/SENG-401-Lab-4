@extends('layouts.subpage')
@section('page_title')
  System Users
@endsection

@section('subtitle')
  <h5>User Details</h5>
@endsection

@section('content')
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
          Subscriptions:
          <div class="h-divider"></div>
          @foreach ($books as $book)
            <a href="/books/{{ $book->id }}"> {{$book->name}} </a>
          </br>
          @endforeach
          <div class="h-divider"></div>
        </div>

      </div>
  </user>

  <p>
    <a class="nav-item" href="/users/{{ $user->id }}/edit"><button type="button" class="btn">Edit this user's record</button></a>
  </p>

  @include('error')
@stop
