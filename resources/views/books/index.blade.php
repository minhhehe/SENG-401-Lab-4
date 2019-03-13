@extends('welcome')

@section('content')
  <h1> Books Page </h1>



  @foreach ($books as $book)
    <article>
        <a href="{{ action('BooksController@show', [$book->id])}}"> {{ $book->name}} </a>
        <p>
          <a href="/projects/{{ $book->id }}/edit"> Edit </a>
        </p>
    </article>
  @endforeach



  <p>
    <a href="/projects/create"> Create a new one </a>
  </p>

@stop
