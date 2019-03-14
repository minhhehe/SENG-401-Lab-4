@extends('welcome')

<style>
  .container { border:2px solid #ccc; width:300px; height: 100px; overflow-y: scroll; }
</style>
@section('content')
  <h1> Book Edit Page </h1>
  <form action="/books/" method="post">
    {{@csrf_field()}}

    <div class="field">
      <label class="label">Name</label>
      <div class="control">
        <input class="input" type="text" placeholder="Enter the book's name" name="name">
      </div>
    </div>

    <div class="field">
      <label class="label">ISBN</label>
      <div class="control">
        <input class="input" type="text" placeholder="Enter the ISBN" name="isbn">
      </div>
    </div>

    <div class="field">
      <label class="label">Year</label>
      <div class="control">
        <input class="input" type="text" placeholder="Enter the year" name="year">
      </div>
    </div>

    <div class="field">
      <label class="label">Publisher</label>
      <div class="control">
        <input class="input" type="text" placeholder="Enter the publisher" name="publisher">
      </div>
    </div>

    <div class="field">
      <label class="label">Image</label>
      <div class="control">
        <input class="input" type="text" placeholder="Enter the image url" name="image">
      </div>
    </div>

    <div class="container">
      @foreach ($authors as $author)
        <input type="checkbox" name="authors[]" value="{{$author->id}}"> <label class="label">{{$author->name}}</label>
        <br />
      @endforeach
    </div>

    <div>
      <button type="submit">Create a new book entry</button>
    </div>

  </form>

  @include('error')
@stop
