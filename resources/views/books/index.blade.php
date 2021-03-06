@extends('layouts.subpage')

@section('page_title')
  System Books
@endsection

@section('subtitle')
  @if ($role == 'admin')
    <a href="/books/create"><button type="button" class="btn"> Add a new book</button> </a>
  @endif
@endsection

@section('content')

  @foreach ($books as $book)
  <ul class="navbar-nav">
      <nav class="navbar navbar-expand-sm navbar-light bg-light">
        <ul class="navbar-nav">
          <li class="nav-item"><a class="nav-link" href="{{ action('BooksController@show', [$book->id])}}"> {{ $book->name}} </a></li>
        </ul>
        </nav>
      <nav class="navbar navbar-expand-sm navbar-light bg-light">
        @if ($role == 'admin')
          <li><a class="nav-item" href="/books/{{ $book->id }}/edit"><button type="button" class="btn">Edit</button> </a>
          <li><div class="v-divider"></div></li>
          <form action="/books/{{ $book->id }}" method="post">
            {{ @csrf_field() }}
            {{ @method_field('DELETE') }}
            <button type="submit" class="btn" name="deleteButton">Delete</button>
          </form>
          <li><div class="v-divider"></div></li>
        @endif
      </ul>
    </nav>
  </ul>
  <div class="h-divider"></div>
  @endforeach

@stop
