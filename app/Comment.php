<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //
    protected $guarded = [];

    public function book(){
      return $this->belongsTo('App/Book');
    }

    public static function deleteAllCommentsOnBook($book_id) {
      $comments = Comment::where('book_id', $book_id)->get();
      foreach($comments as $comment) $comment->delete();
    }
}
