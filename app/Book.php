<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    //
    public function authors() {
      return $this->belongsToMany('App\Author', 'author_book', 'author_id', 'book_id');
    }


    public function comments()
    {
      return $this->hasMany('App\Comment');
    }
}
