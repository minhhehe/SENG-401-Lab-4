<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Subscription;
use Illuminate\Support\Facades\DB;


class Book extends Model
{
    //

    protected $guarded = [];

    public function getAuthors() {


      $authorsIDs = AuthorBook::where('book_id', $this->id)->get();
      $authors = Author::whereIn('id', $authorsIDs->pluck('author_id'))->get();

      return $authors;
    }

    public function getComments() {

      $comments = DB::table('comments')
        ->join('users', 'users.id', '=', 'comments.user_id')
        ->join('books', 'books.id', '=', 'comments.book_id')
        ->select('users.email', 'comments.comment', 'comments.created_at')
        ->where('books.id', '=', $this->id)
        ->get();
      return $comments;

    }

    public function getSubscriber() {
      $subscriber = DB::table('subscriptions')
        ->join('users', 'users.id', '=', 'subscriptions.user_id')
        ->join('books', 'books.id', '=', 'subscriptions.book_id')
        ->select('users.email')
        ->where('books.id', '=', $this->id)
        ->get();
      return $subscriber;
    }

}
