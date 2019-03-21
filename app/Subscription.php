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

    public static function getSubscription($book) {
      $subscription = DB::table('subscriptions')->where('book_id', $book->id)->first();
      return $subscription;
    }

    public static function deleteSubscriptionOnBookID($book_id) {
      $subscription = Subscription::where('book_id', $book_id)->get()->first();
      $subscription->delete();
    }

    public static function deleteAllSubscriptionsOnBook($book_id) {
      $subscriptions = Subscription::where('book_id', $book_id)->get();
      foreach($subscriptions as $subscription) $subscription->delete();
    }
}
