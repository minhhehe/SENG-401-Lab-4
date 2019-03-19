<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\DB;

class CommentCheck implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        //
        $user = auth()->user();
        $book_id = $value;
        $histories_count = DB::table('histories')
          ->select('user_id')
          ->where('user_id', '=', $user->id)
          ->where('book_id', '=', $book_id)
          ->count();
        if ($histories_count > 0 || $user->role == 'admin') {
          return true;
        }
        return false;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'You dont have permission to do this.';
    }
}
