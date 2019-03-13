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
          Authors:
          @foreach ($authors as $author)
            <a href="/authors/{{ $author->id }}"> {{ $author->name}} </a>
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
        </div>

    </div>
  </book>

  <p>
    <a href="/projects/create"> Create a new one </a>
  </p>

@stop
