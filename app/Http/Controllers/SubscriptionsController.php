<?php

namespace App\Http\Controllers;

use App\User;
use App\Book;
use App\Subscription;
use App\History;
use App\Rules\SubscriptionFromAdminCheck;
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
        $this->authorize('view');
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
        $this->authorize('create');
        $books = \App\Book::all();
        $users = \App\User::getNonVisitorUsers();
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

        $validated = request()->validate([
          'user_id' => ['required'],
          'book_id' => ['required', new SubscriptionFromAdminCheck],
        ]);

        Book::makeABookSubscribed($request['book_id']);
        Subscription::create($validated);
        History::create($validated);

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
        Book::makeABookUnsubscribed($request['book_id']);
        Subscription::deleteSubscriptionOnBookID($request['book_id']);
        //Subscription::delete($subscription);

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
        Book::makeABookUnsubscribed($subscription['book_id']);
        $subscription->delete();
        return redirect('/subscriptions');
    }
}
