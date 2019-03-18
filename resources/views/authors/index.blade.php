@extends('layouts.subpage')

@section('page_title')
  Authors List
@endsection

@section('subtitle')
  @if ($role == 'admin')
  <h5>View, edit, or delete authors</h5><a href="/authors/create"><button type="button" class="btn"> Add a new author</button> </a>
  @else
  <h5>View authors</h5>
  @endif
@endsection

@section('content')
  <nav class="navbar navbar-light bg-light">

  @foreach ($authors as $author)
  <ul class="navbar-nav">
      <nav class="navbar navbar-expand-sm navbar-light bg-light">
        <ul class="navbar-nav">
        @if ($role == 'admin')
        <form action="/authors/{{ $author->id }}" method="post">
          {{ @csrf_field() }}
          {{ @method_field('DELETE') }}
          <button type="submit" class="btn" name="deleteButton">Delete</button>
        </form>
        <li><div class="v-divider"></div></li>
        <li><a class="nav-item" href="/$authors/{{ $author->id }}/edit"><button type="button" class="btn">Edit</button> </a>
        <li><div class="v-divider"></div></li>
        @endif
        <li class="nav-item"><a class="nav-link" href="{{ action('AuthorsController@show', [$author->id])}}"> {{ $author->name}} </a></li>
      </ul>
    </nav>
</ul>
<div class="h-divider"></div>
  @endforeach

</nav>

@stop
