<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class History extends Model
{
    //
    protected $guarded = [];
    
    public static function didSubscribe($data) {
      $user_id = $data['user_id'];
      $book_id = $data['book_id'];
      $histories_count = DB::table('histories')
        ->select('user_id')
        ->where('user_id', '=', $user_id)
        ->where('book_id', '=', $book_id)
        ->count();
      if ($histories_count > 0) {
        return true;
      }
      return false;

    }
}
