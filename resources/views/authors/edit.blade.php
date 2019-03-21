@extends('layouts.subpage')

@section('page_title')
  Edit Author: "{{$author->name}}"
@endsection

@section('subtitle')
  Ensure all fields are complete
@endsection

@section('content')
  <form action="/authors/{{$author->id}}" method="post">
    {{@csrf_field()}}
    {{ method_field('PATCH') }}
    <br>
    <div class="field">
      <div class="control">
        <label class="label col-md-3">Author's Name:</label>
        <input class="input" type="text" value="{{$author->name}}"  name="name">
      </div>
    </div>
    <div class="h-divider"></div>
    <div>
      </br>
      <button class="btn" type="submit">Update author entry</button>
    </div>

</form>

    @include('error')
  @stop
