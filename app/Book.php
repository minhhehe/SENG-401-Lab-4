<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Book extends Model
{
    //

    public function getAuthors() {


      $authorsIDs = AuthorBook::where('book_id', $this->id)->get();
      $authors = Author::whereIn('id', $authorsIDs->pluck('author_id'))->get();

      return $authors;
    }
}
