@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>
                   Welcome Mr. {{$user->email}}(lol)

                   Here are books you have been subscribed to:


                  @foreach ($books as $book)
                    <a href='/books/{{$book->id}}'> {{$book->name}} </a>
                  @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
