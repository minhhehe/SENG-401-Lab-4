@extends('layouts.subpage')

@section('page_title')
  Edit User: "{{$user->email}}"
@endsection

@section('subtitle')
  Ensure all fields are complete
@endsection

@section('content')
  <form action="/users/{{$user->id}}" method="post">
    {{@csrf_field()}}
    {{ method_field('PATCH') }}
    <br>
    <div class="field">
      <div class="control">
        <label class="label col-md-3">User's Email:</label>
        <input class="input" type="text" name="email" value="{{$user->email}}">
      </div>
    </div>

    <div class="h-divider"></div>

      <div class="field">
        <div class="control">
          <label class="label col-md-3">User's birthday:</label>
          <input class="input" type="date" name="birthday" value="{{$user->birthday}}">
        </div>
      </div>

      <div class="h-divider"></div>

      <div class="field">
        <div class="control">
          <label class="label col-md-3">User's Education: </label>
          <input class="input" type="text" name="education_field" value="{{$user->education_field}}">
        </div>
      </div>

      <div class="h-divider"></div>

      <div class="field">
        <div class="control">
          <label class="label col-md-3">User's Role: </label>
          <select name="role">
              <option disabled selected value> -- Currently: {{$user->role}} -- </option>
              <option value="visitor"> Visitor </option>
              <option value="subscriber"> Subscriber </option>
              <option value="admin"> Admin </option>
          </select>
        </div>
      </div>

    <div>
      </br>
      <button class="btn" type="submit">Update user entry</button>
    </div>
  </form>

@include('error')
@stop
