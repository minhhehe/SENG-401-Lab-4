@extends('layouts.subpage')

@section('page_title')
  Book Information: "{{$book->name}}"
@endsection

@section('subtitle')
  <h5>Book Details</h5>

  @if ($role == 'admin')
  <p>
    <form style="display:inline;" action="/books/{{ $book->id }}" method="post">
      {{ @csrf_field() }}
      {{ @method_field('DELETE') }}
      <button class="btn" type="submit" name="deleteButton">Delete this book</button>
    </form>
    <a href="/books/{{ $book->id }}/edit"><button class="btn" type="submit" name="editButton">Edit this book </button></a>
  </p>
  @endif
@endsection

@section('content')
  <book>
    <div style="background:lightgrey;">
      <img class="block-center" src="{{ $book->image }}" alt="{{$book->name}}">
    </div>

    <div class="h-divider"></div>

    <div class="field">
      <table style="margin:10px;">
        <tr>
          <td><label class="label">Title:</label></td>
          <td><b>{{ $book->name }}</b></td>
        </tr>

        <tr>
          <td><label class="label">ISBN: </label></td>
          <td><b>{{ $book->isbn }}</b></td>
        </tr>

        <tr>
          <td><label class="label">Year: </label></td>
          <td><b>{{ $book->year }}</b></td>
        </tr>

        <tr>
          <td><label class="label">Publisher: </label></td>
          <td><b>{{ $book->publisher }}</b></td>
        </tr>

        <tr><td>
          <label class="label">Authors: </label></br>
          @foreach ($authors as $author)
            <b><a class="nav-item nav-link" href="/authors/{{ $author->id }}"> {{ $author->name}} </a></b> </br>
            @endforeach
        </td></tr>
        </table>

        <div>
          <label class="label">Subscription status:</label> {{ $book->sub_status }}
          @if (count($subscriber) > 0)
            by <b>{{ $subscriber[0]->email }}</b>
          @endif
        </div>

        @if ($role == 'admin' || $role == 'subscriber')
          @if ($book->sub_status == 'unsubscribed')
          <form class="form" action="/subscriptions" method="post">
            {{ @csrf_field() }}
            <div class="field">
              <div class="control">
                <input class="input" type="text" name="book_id" value="{{$book->id}}" hidden>
                <button class="btn" type="submit" name="submitButton">Subscribe</button>
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
                  <button class="btn" type="submit" name="submitButton">Unsubscribe</button>
                </div>
              </div>
            </form>
          @endif
        @endif

        <div class="h-divider"></div>
        <br>
        <div>
          <label class="label">Comments:</label>
        </div>

        <div class="container_wide">
          @if (count($comments) > 0)
            @foreach ($comments as $comment)
              <div>
                {{$comment->email}} on {{$comment->created_at}} said:
                  {{$comment->comment}}
                </br>
                @if ($role == 'admin')
                <form style="text-align: right;"  action="/comments/{{ $comment->id }}" method="post">
                  {{ @csrf_field() }}
                  {{ @method_field('DELETE') }}
                  <button class="btn btn-sm" type="submit" name="deleteButton">Delete this comment</button>
                </form>
                @endif
              </div>
              <div class="h-divider"></div>
            @endforeach
          @else No comment yet! Be the first to comment!
          @endif
        </div>
  </book>
<br>


  @if ($role == 'admin' || $role == 'subscriber')
    <form class="form" action="/comments" method="post" style="width:auto;">
      {{ @csrf_field() }}
      <div class="field">
        <label class="label">Add a comment</label>
        <div class="control" style="display:flex;width:100%;" >
          <input class="input"  style="flex-grow:1;" type="text" placeholder="Your comment..." name="comment">
          <input class="input" type="text" value="{{$book->id}}" name="book_id" hidden>
          <button class="btn btn-sm" type="submit">Comment</button>
        </div>
      </div>
    </form>
  @endif

  @include('error')
@stop
