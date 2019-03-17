@extends('layouts.welcome')

<style>
  .container { border:2px solid #ccc; width:300px; height: 100px; overflow-y: scroll; }
</style>
@section('content')
  <h1> Author Create Page </h1>
  <form action="/authors/" method="post">
    {{@csrf_field()}}

    <div class="field">
      <label class="label">Author's Name</label>
      <div class="control">
        <input class="input" type="text" placeholder="Enter the author's name" name="name">

      </div>
    </div>

    <div>
      </br>
      <button type="submit">Add a new author entry</button>
    </div>

</form>

    @include('error')
  @stop'
