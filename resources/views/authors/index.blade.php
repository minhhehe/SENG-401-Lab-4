@extends('layouts.welcome')

@section('content')
  <h1> Authors Page </h1>


  <div class="container_big">
  @foreach ($authors as $author)
    <article>
        <a href="{{ action('AuthorsController@show', [$author->id])}}"> {{ $author->name}} </a>
        @if ($role == 'admin')
        <p>
          <a href="/$authors/{{ $author->id }}/edit"> Edit this record OR </a>
          <form action="/authors/{{ $author->id }}" method="post">
            {{ @csrf_field() }}
            {{ @method_field('DELETE') }}
            <button type="submit" name="deleteButton">Delete this author record</button>
          </form>
        </p>
        @endif
    </article>
  @endforeach
  </div>


  @if ($role == 'admin')
  <p>
    <a href="/authors/create"> Create a new one </a>
  </p>
  @endif

@stop
