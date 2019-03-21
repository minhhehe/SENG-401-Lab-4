@extends('layouts.subpage')

@section('page_title')
  Edit Book: "{{$book->name}}"
@endsection

@section('subtitle')
  Ensure all fields are complete
@endsection

@section('content')
  <form action="/books/{{$book->id}}" method="post">
    {{@csrf_field()}}
    {{ method_field('PATCH') }}
    <br>
    <div class="field">
      <div class="control">
        <label class="label col-md-3">Books's Name:</label>
        <input class="input" type="text" value="{{$book->name}}" name="name">

        <div class="h-divider"></div>

        <label class="label col-md-3">Books's ISBN:</label>
        <input class="input" type="text" value="{{$book->isbn}}" name="isbn">

        <div class="h-divider"></div>

        <label class="label col-md-3">Books's Year:</label>
        <input class="input" type="text" value="{{$book->year}}" name="year">

        <div class="h-divider"></div>

        <label class="label col-md-3">Books's Publisher:</label>
        <input class="input" type="text" value="{{$book->publisher}}" name="publisher">

        <div class="h-divider"></div>

        <label class="label col-md-3">Books's Image:</label>
        <input class="input" type="text" value="{{$book->image}}" name="image">

        <div class="h-divider"></div>

        <label class="label col-md-3" style="vertical-align: top;">Book's Author(s):</label>
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
      </br>
      <button class="btn" type="submit">Update book entry</button>
    </div>

</form>

    @include('error')
  @stop
