<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $users = User::all();
        return view('users.index', compact(['users']));
    }

    public function indexForSubscriber(User $user) {

      $books = User::getSubscribedBooks($user);

      return view('users.subscribedBooks', compact(['books', 'user']));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        $books = User::getSubscribedBooks($user);
        return view('users.show', compact(['user', 'books']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //TODO Logic for default select role value. Needs refactor
        $role_v = "";
        $role_s = "";
        $role_a = "";
        if ($user->role == "admin") {
          $role_a = "selected";
        }
        elseif ($user->role == "subscriber"){
          $role_s = "selected";
        }
        else{
          $role_v = "selected";
        }
        return view('users.edit', compact(['user', 'role_v', 'role_a', 'role_s']));
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
        $data = request()->validate([
          'email' => ['required', 'email'],
          'role' => ['required'],
          'education_field' => ['required'],
          'birthday' => ['required', 'date'],
        ]);
        $user->update($data);
        return redirect('/users');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
