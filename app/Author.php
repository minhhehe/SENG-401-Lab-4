<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Book;


class Author extends Model
{
    //

    protected $guarded=[];
    public function books() {
      $this->hasMany(Book::class, 'ISBN');
    }

    public function getBooks() {
      
    }
}
