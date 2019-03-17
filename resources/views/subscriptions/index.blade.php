@extends('layouts.welcome')

@section('content')
  <h1 class="title"> List of subscriptions </h1>

    @foreach ($subs as $sub)
    <form method="POST" action="/subscriptions/{{$sub->id}}">

      {{ method_field('DELETE') }}
      {{ csrf_field() }}
    <div class = "field">

        {{ $sub->email }} subscribes to {{ $sub->name }} | {{ $sub->isbn}}
        <button type="submit" class="button" name="delete">Delete Subscription</button>

    </div>
    </form>
    @endforeach



@stop
