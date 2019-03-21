@extends('layouts.subpage')

@section('page_title')
  Author Information Page
@endsection

@section('subtitle')
  <h5>{{$author->name}}</h5>
@endsection

@section('content')

  <author>

    <div class="field margin-center">
          Books:</br>
          @foreach ($books as $book)
          <nav class="navbar navbar-light bg-light">
            <ul class="navbar-nav">
              <li class="nav-item"><a class="nav-link" href="/books/{{ $book->id }}"> {{$book->name}} </a></li>
            </ul>
          </nav>
          @endforeach
          <div class="h-divider"></div>
        </div>
    </div>

  </author>
  @if ($role == 'admin')

    <a class="nav-link" href="/authors/{{$author->id}}/edit"> <button class="btn">Edit this author</button> </a>
    <form class="nav-link" action="/authors/{{ $author->id }}" method="post">
      {{ @csrf_field() }}
      {{ @method_field('DELETE') }}
      <button type="submit" class="btn" name="deleteButton">Delete this author</button>
    </form>
    <div class="h-divider"></div>

  @endif

@include('error')
@stop
