<?php

namespace App\Http\Controllers;

use App\User;
use App\Book;
use App\Subscription;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class SubscriptionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(User $user)
    {
        //
        $subs = Subscription::getAll();
        return view('subscriptions.index', compact(['subs']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $books = \App\Book::all();
        $users = \App\User::all();
        return view('subscriptions.create', compact(['books','users']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $toGo = '/subscriptions';
        if ($request['user_id'] == null) {
          $toGo = '/books/'.$request['book_id'];
          $request['user_id'] = auth()->user()->id;
        }
        $bookIds = Subscription::where('book_id', $request['book_id'])->get()->pluck('book_id');
        $validated = request()->validate([
          'user_id' => ['required'],
          'book_id' => ['required', Rule::notIn($bookIds)],
        ]);
        $user = User::find($request['book_id']);

        $datBook = Book::where('id', $request['book_id'])->get()->first();
        $datBook->update(['sub_status' => 'subscribed']);

          Subscription::create($validated);

          if (auth()->user()->role == "subscriber") {
            $request['user_id'] = auth()->user()->id;
          }
          return redirect($toGo);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //



    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroyFromUser(Request $request)
    {
        $datBook = Book::find($request['book_id']);
        $subscription = Subscription::where('book_id', $request['book_id'])->get()->first();

        $subscription->delete();
        //Subscription::delete($subscription);

        $datBook->update(['sub_status' => 'unsubscribed']);
        return redirect('/books/'.$request['book_id']);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(Subscription $subscription)
    {

        $datBook = Book::where('id', $subscription['book_id'])->get()->first();

        $subscription->delete();

        $datBook->update(['sub_status' => 'unsubscribed']);
        return redirect('/subscriptions');
    }
}
