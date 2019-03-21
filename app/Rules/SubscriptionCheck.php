<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class SubscriptionCheck implements Rule
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
    public function passes($user_id, $book_id)
    {
        //
        $returned = DB::table('subscriptions')
          ->where('user_id', '=', $values['user_id'])
          ->where('book_id', '=', $values['book_id'])
          ->first();
        if (is_null($returned)) {
          return true;
        } else {
          return false;
        };
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The user already subscribed to this book.';
    }
}
