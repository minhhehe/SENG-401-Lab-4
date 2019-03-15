<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Book;
use Illuminate\Support\Facades\DB;

class Author extends Model
{
    //

    protected $guarded=[];
    
    public function books() {
      $this->hasMany(Book::class, 'ISBN');
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
