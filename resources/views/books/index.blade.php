@extends('welcome')

@section('content')
  <h1> Books Page </h1>


  <div class="container_big">
  @foreach ($books as $book)
    <article>
        <a href="{{ action('BooksController@show', [$book->id])}}"> {{ $book->name}} </a>
        @if ($role == 'admin')
        <p>
          <a href="/books/{{ $book->id }}/edit"> Edit </a>
        </p>
        @endif
    </article>
  @endforeach
  </div>


  @if ($role == 'admin')
  <p>
    <a href="/books/create"> Create a new one </a>
  </p>
  @endif

@stop
