@extends('welcome')

@section('content')
  <h1> Books Page </h1>


  <div class="container_big">
  @foreach ($books as $book)
    <article>
        <a href="{{ action('BooksController@show', [$book->id])}}"> {{ $book->name}} </a>
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
    </article>
  @endforeach
  </div>


  @if ($role == 'admin')
  <p>
    <a href="/books/create"> Create a new one </a>
  </p>
  @endif

@stop
