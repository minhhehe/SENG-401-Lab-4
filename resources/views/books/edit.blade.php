@extends('welcome')



@section('content')
  <h1> Book Edit Page </h1>
  <form action="/books/{{$book->id}}" method="post">
    {{@csrf_field()}}
    {{@method_field('PATCH')}}

    <div class="field">
      <label class="label">Name</label>
      <div class="control">
        <input class="input" type="text" value="{{$book->name}}" name="name">
      </div>
    </div>

    <div class="field">
      <label class="label">ISBN</label>
      <div class="control">
        <input class="input" type="text" value="{{$book->isbn}}">
      </div>
    </div>

    <div class="field">
      <label class="label">Year</label>
      <div class="control">
        <input class="input" type="text" value="{{$book->year}}">
      </div>
    </div>

    <div class="field">
      <label class="label">Publisher</label>
      <div class="control">
        <input class="input" type="text" value="{{$book->publisher}}">
      </div>
    </div>

    <div class="field">
      <label class="label">Image</label>
      <div class="control">
        <input class="input" type="text" value="{{$book->image}}">
      </div>
    </div>

    <div class="container_small">
      @foreach ($authors as $author)
        <input type="checkbox" name="authors[]" value="{{$author->id}}"> <label class="label">{{$author->name}}</label>
        <br />
      @endforeach
    </div>

    <div>
      <button type="submit">Update book entry</button>
    </div>

  </form>
  @include('error')
@stop
