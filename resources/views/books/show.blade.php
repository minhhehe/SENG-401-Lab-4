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

    </div>
  </book>
  @if ($role == 'admin')
    <p>
      <a href="/projects/{{$book->id}}"> Edit this book </a>
    </p>
    <p>
      <a href="/projects/create"> Create a new one </a>
    </p>
  @endif

@stop
