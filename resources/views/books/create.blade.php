@extends('layouts.subpage')

@section('page_title')
  Add a New Book
@endsection

@section('subtitle')
  Book Information
@endsection

@section('content')
  <form action="/books/" method="post">
    {{@csrf_field()}}
    <br>
    <div class="field">
      <div class="control">
        <label class="label col-md-3">Name</label>
        <input class="input" type="text" placeholder="Enter the book's title" name="name">
      </div>
    </div>

    <div class="h-divider"></div>

    <div class="field">
      <div class="control">
        <label class="label col-md-3">ISBN</label>
        <input class="input" type="text" placeholder="Enter the ISBN" name="isbn">
      </div>
    </div>

    <div class="h-divider"></div>

    <div class="field">
      <div class="control">
        <label class="label col-md-3">Year</label>
        <input class="input" type="text" placeholder="Enter the year" name="year">
      </div>
    </div>

    <div class="field">
      <div class="control">
        <label class="label col-md-3">Publisher</label>
        <input class="input" type="text" placeholder="Enter the publisher" name="publisher">
      </div>
    </div>

    <div class="h-divider"></div>

    <div class="field">
      <div class="control">
        <label class="label col-md-3">Image</label>
        <input class="input" type="text" placeholder="Enter the image url" name="image">
      </div>
    </div>

    <div class="h-divider"></div>

    <div class="field">
      <div class="control">
        <label class="label col-md-3" style="vertical-align: top;">Author(s)</label>
        <div class="container_small" style="display:inline-block;">
          @foreach ($authors as $author)
            <input type="checkbox" name="authors[]" value="{{$author->id}}"> <label class="label">{{$author->name}}</label>
            <br />
          @endforeach
        </div>
      </div>
    </div>

    <div class="h-divider"></div>

    <div>
      <button class="btn" type="submit">Create a new book entry</button>
    </div>

  </form>

  @include('error')
@stop
