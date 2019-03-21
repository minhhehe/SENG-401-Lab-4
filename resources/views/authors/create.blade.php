@extends('layouts.subpage')

@section('page_title')
  Add New Author
@endsection

@section('subtitle')
  Ensure all fields are complete
@endsection

@section('content')

  <form action="/authors/" method="post">
    {{@csrf_field()}}
    <br>
    <div class="field">

    <div class="control">
      <label class="label col-md-3">Author's Name:</label>
      <input class="input" type="text" placeholder="Enter the author's name" name="name">
    </div>
    </div>

    <div class="h-divider"></div>

    <div>
      </br>
      <button class="btn" type="submit">Add author to system</button>
    </div>

</form>

    @include('error')
  @stop'
