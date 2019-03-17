@extends('welcome')

<style>
  .container { border:2px solid #ccc; width:300px; height: 100px; overflow-y: scroll; }
</style>
@section('content')
  <h1> Author Edit Page </h1>
  <form action="/authors/{{$author->id}}" method="post">
    {{@csrf_field()}}
    {{ method_field('PATCH') }}
    <div class="field">
      <label class="label">Author's Name</label>
      <div class="control">
        <input class="input" type="text" placeholder="{{$author->name}}" name="name">

      </div>
    </div>

    <div>
      </br>
      <button type="submit">Update author entry</button>
    </div>

</form>

    @include('error')
  @stop
