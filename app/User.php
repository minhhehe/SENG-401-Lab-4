<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\DB;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
      'email', 'password', 'birthday', 'role', 'education_field',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public static function getSubscribedBooks(User $user) {
      $books = DB::table('subscriptions')
        ->join('users', 'users.id', '=', 'subscriptions.user_id')
        ->join('books', 'books.id', '=', 'subscriptions.book_id')
        ->select()
        ->where('subscriptions.user_id', '=', $user->id)
        ->get();
      return $books;
    }

}
