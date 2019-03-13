<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Book;


class Author extends Model
{
    //
    public function books() {
      $this->hasMany(Book::class, 'ISBN');
    }


}
