@extends('welcome')

@section('content')
  <h1> Author detail Page </h1>

  <author>
    <div class="field">
      <label class="label">Author's name:</label>

      <b> {{ $author->name }}</b>
        <div>
          Books:</br>
          @foreach ($books as $book)
            <a href="/books/{{ $book->id }}"> {{ $book->name}} </a> </br>
            @endforeach
        </div>

  </author>



  @if ($role == 'admin')
    <p>
      <a href="/authors/{{$author->id}}/edit"> Edit this author </a>
    </p>
    <form action="/authors/{{ $author->id }}" method="post">
      {{ @csrf_field() }}
      {{ @method_field('DELETE') }}
      <button type="submit" name="deleteButton">Delete this author record</button>
    </form>
    <p>
      <a href="/books/create"> Create a new author </a>
    </p>
  @endif

  @include('error')
@stop
