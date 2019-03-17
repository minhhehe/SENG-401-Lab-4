<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
      $role = auth()->user()->role;
      $user = auth()->user();
      if ($role == 'admin')
        return view('homeAdmin',   compact(['user']));
      else if ($role == 'subscriber')
        return view('homeSubscriber', compact(['user']));
      else return view('homeVisitor', compact(['user']));
    }
}
