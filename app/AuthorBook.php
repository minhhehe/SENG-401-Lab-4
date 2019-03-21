<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AuthorBook extends Model
{
    //
    protected $guarded = [];

    public static function getAuthorBook($author_id) {
      $author_books = AuthorBook::where('author_id', $author_id)->get();
      return $author_books;
    }

    public static function deleteAllAuthorBooksOnBook($book_id) {
      $author_books = AuthorBook::where('book_id', $book_id)->get();
      foreach($author_books as $author_book) $author_book->delete();
    }
}
