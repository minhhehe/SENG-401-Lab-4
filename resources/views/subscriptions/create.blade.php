@extends('layouts.subpage')

@section('page_title')
  Create Subscription
@endsection

@section('subtitle')
  <h5>Add a subscription to a user</h5>
@endsection

@section('content')
<br>

  <form method="POST" action="/subscriptions">
    {{ csrf_field() }}
    <div class="field">
      <div class="control">
      <label class="label col-md-2">User: </label>
      <select name="user_id">
        @foreach ($users as $user)
          <option value="{{$user->id}}"> {{$user->email}} </option>
        @endforeach
      </select>
      </div>
    </div>

    <div class="field">
      <div class="control">
      <label class="label col-md-3">Book: </label><br>
      <select name="book_id">
        @foreach ($books as $book)
          <option value="{{$book->id}}"> {{$book->name}} | {{ $book->isbn }} </option>
        @endforeach
      </select>
    </div>

    <div class="h-divider"></div>

    <div>
      <button class="btn" type="submit">Subscribe</button>
    </div>

    @include('error')

@stop
