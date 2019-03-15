@extends('welcome')

<style>
  .container { border:2px solid #ccc; width:300px; height: 100px; overflow-y: scroll; }
</style>
@section('content')
  <h1> User Edit Page </h1>
  <form action="/users/{{$user->id}}" method="post">
    {{@csrf_field()}}
    {{ method_field('PATCH') }}
    <div class="field">
      <label class="label">User's Email</label>
      <div class="control">
        <input class="input" type="text" name="email" placeholder="{{$user->email}}" name="name">
      </div>

      <div class="field">
        <label class="label">User's birthday</label>
        <div class="control">
          <input class="input" type="date" name="birthday" placeholder="{{$user->birthday}}">
        </div>
      </div>

      <div class="field">
        <label class="label">User's Education field</label>
        <div class="control">
          <input class="input" type="text" name="education_field" placeholder="{{$user->education_field}}">
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
      <button type="submit">Update user entry</button>
    </div>

</form>

    @include('error')
  @stop
