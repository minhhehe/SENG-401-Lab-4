@extends('layouts.subpage')

@section('page_title')
  Subscription List
@endsection

@section('subtitle')
  <h5>View all subscriptions</h5>
@endsection

@section('content')
  <nav class="navbar navbar-light bg-light">

    @foreach ($subs as $sub)
    <ul class="navbar-nav">
        <nav class="navbar navbar-expand-sm navbar-light bg-light">
          <ul class="navbar-nav">
            <form method="POST" action="/subscriptions/{{$sub->id}}">
              {{ method_field('DELETE') }}
              {{ csrf_field() }}
              <button type="submit" class="btn" name="delete">Delete Subscription</button>
            </form>
          <li><div class="v-divider"></div></li>
          <li class="nav-link">{{ $sub->email }} | subscribes to | {{ $sub->name }} | {{ $sub->isbn}}</li>
        </ul>
      </nav>
    </ul>
    @endforeach
  </nav>

@stop
