@extends('layouts.welcome')

@section('content')
  <h1> Book detail Page </h1>

  <book>
    <div>
      <img src="{{ $book->image }}" alt="{{$book->name}}">
    </div>

    <div class="field">
      <label class="label">Book's name:</label>

      <b> {{ $book->name }}</b>
        <div>
          Authors:</br>
          @foreach ($authors as $author)
            <a href="/authors/{{ $author->id }}"> {{ $author->name}} </a> </br>
            @endforeach
        </div>

        <div>
          ISBN: {{ $book->isbn }}
        </div>
        <div>
          Year: {{ $book->year }}
        </div>
        <div>
          Publisher: {{ $book->publisher }}
        </div>

        <div>
          Subscription status: {{ $book->sub_status }}
          @if (count($subscriber) > 0)
            by {{ $subscriber[0]->email }}
          @endif
        </div>

        <div class="container_medium">
          Comments:
          @if (count($comments) > 0)
            @foreach ($comments as $comment)
              <div>
                {{$comment->email}} on {{$comment->created_at}} said:
                  {{$comment->comment}}
                </br>
                @if ($role == 'admin')
                <form action="/comments/{{ $comment->id }}" method="post">
                  {{ @csrf_field() }}
                  {{ @method_field('DELETE') }}
                  <button type="submit" name="deleteButton">Delete this comment</button>
                </form>
                @endif
              </div>
            @endforeach
          @else No comment yet! Be the first to comment!
          @endif
        </div>
    </div>
  </book>

  @if ($role == 'admin' || $role == 'subscriber')
    <form class="form" action="/comments" method="post">
      {{ @csrf_field() }}
      <div class="field">
        <label class="label">Add a comment</label>
        <div class="control">
          <input class="input" type="text" placeholder="Your comment..." name="comment">
          <input class="input" type="text" value="{{$book->id}}" name="book_id" hidden>
          <button type="submit">Comment</button>
        </div>
      </div>
    </form>
    @if ($book->sub_status == 'unsubscribed')
    <form class="form" action="/subscriptions" method="post">
      {{ @csrf_field() }}
      <div class="field">
        <div class="control">
          <input class="input" type="text" name="book_id" value="{{$book->id}}" hidden>
          <button type="submit" name="submitButton">Subscribe</button>
        </div>
      </div>
    </form>
    @elseif ($subscription->user_id == $user->id)
      <form class="form" action="subscriptions/books" method="post">
        {{ @csrf_field() }}
        {{ method_field('DELETE') }}
        <div class="field">
          <div class="control">
            <input class="input" type="text" name="book_id" value="{{$book->id}}" hidden>
            <button type="submit" name="submitButton">Unsubscribe</button>
          </div>
        </div>
      </form>

    @endif
  @endif

  @if ($role == 'admin')
  <p>
    <a href="/books/{{ $book->id }}/edit"> Edit this book </a> OR
    <form action="/books/{{ $book->id }}" method="post">
      {{ @csrf_field() }}
      {{ @method_field('DELETE') }}
      <button type="submit" name="deleteButton">Delete it</button>
    </form>
  </p>
  @endif

  @include('error')
@stop
