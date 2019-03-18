@extends('layouts.subpage')

@section('page_title')
  Edit User: "{{Auth::user()->email}}"
@endsection

@section('subtitle')
  Ensure all fields are complete
@endsection

@section('content')
  <form action="/users/{{$user->id}}" method="post">
    {{@csrf_field()}}
    {{ method_field('PATCH') }}
    <div class="field">
      <label class="label">User's Email</label>
      <div class="control">
        <input class="input" type="text" name="email" value="{{$user->email}}" name="name">
      </div>

      <div class="field">
        <label class="label">User's birthday</label>
        <div class="control">
          <input class="input" type="date" name="birthday" value="{{$user->birthday}}">
        </div>
      </div>

      <div class="field">
        <label class="label">User's Education field</label>
        <div class="control">
          <input class="input" type="text" name="education_field" value="{{$user->education_field}}">
        </div>
      </div>

      <select name="role">
          <option value="visitor"> Just a Visitor </option>
          <option value="subscriber"> Normal Subscriber </option>
          <option value="admin"> Omnipotent Admin </option>
      </select>

    </div>

    <div>
      </br>
      <button class="btn" type="submit">Update user entry</button>
    </div>

</form>

    @include('error')
  @stop
