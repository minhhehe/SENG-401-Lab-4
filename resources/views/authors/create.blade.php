@extends('welcome')

@section('content')
  <h1> Book Edit Page </h1>
  <form action="/books/" method="post">
    {{@csrf_field()}}
    {{@method_field('PATCH')}}

    <div class="field">
      <label class="label">Name</label>
      <div class="control">
        <input class="input" type="text" placeholder="{{$book->name}}" name="name">
      </div>
    </div>

    <div class="field">
      <label class="label">ISBN</label>
      <div class="control">
        <input class="input" type="text" placeholder="{{$book->isbn}}">
      </div>
    </div>

    <div class="field">
      <label class="label">Year</label>
      <div class="control">
        <input class="input" type="text" placeholder="{{$book->year}}">
      </div>
    </div>

    <div class="field">
      <label class="label">Publisher</label>
      <div class="control">
        <input class="input" type="text" placeholder="{{$book->publisher}}">
      </div>
    </div>

    <div class="field">
      <label class="label">Image</label>
      <div class="control">
        <input class="input" type="text" placeholder="{{$book->image}}">
      </div>
    </div>


  </form>

@stop
