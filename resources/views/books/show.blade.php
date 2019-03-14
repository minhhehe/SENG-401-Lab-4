@extends('welcome')

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
              <div>
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
  @endif

  @if ($role == 'admin')
    <p>
      <a href="/books/{{$book->id}}"> Edit this book </a>
    </p>
    <p>
      <a href="/books/create"> Create a new one </a>
    </p>
  @endif

  @include('error')
@stop
