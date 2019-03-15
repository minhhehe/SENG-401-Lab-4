<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Book;
use Illuminate\Support\Facades\DB;

class Author extends Model
{
    //

    protected $guarded=[];

    //
    public function books()
    {
      return $this->belongsToMany('App\Book', 'author_book', 'author_id', 'book_id');
    }

    public function getBooks() {
      $books = DB::table('author_books')
        ->join('authors', 'authors.id', '=', 'author_books.author_id')
        ->join('books', 'books.id', '=', 'author_books.book_id')
        ->select('books.name', 'books.id')
        ->where('authors.id', '=', $this->id)
        ->get();
      return $books;
    }


}
