<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Subscription extends Model
{
    //

    protected $fillable = [
      'user_id',
      'book_id'
    ];

    public static function getAll() {

      $translate = DB::table('subscriptions')
        ->join('users', 'users.id', '=', 'subscriptions.user_id')
        ->join('books', 'books.id', '=', 'subscriptions.book_id')
        ->select('subscriptions.id', 'users.email', 'books.name', 'books.isbn')
        ->get();
      return $translate;
    }

    public static function checkIfAlreadyExist($values) {

    }
}
