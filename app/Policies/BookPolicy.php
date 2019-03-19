<?php

namespace App\Policies;

use App\User;
use App\book;
use Illuminate\Auth\Access\HandlesAuthorization;

class BookPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the book.
     *
     * @param  \App\User  $user
     * @param  \App\book  $book
     * @return mixed
     */
    public function view(User $user, book $book)
    {
        return true;
    }

    /**
     * Determine whether the user can create books.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return false;
    }

    /**
     * Determine whether the user can update the book.
     *
     * @param  \App\User  $user
     * @param  \App\book  $book
     * @return mixed
     */
    public function update(User $user, book $book)
    {
        return false;
    }

    /**
     * Determine whether the user can delete the book.
     *
     * @param  \App\User  $user
     * @param  \App\book  $book
     * @return mixed
     */
    public function delete(User $user, book $book)
    {
        return false;
    }

    /**
     * Determine whether the user can restore the book.
     *
     * @param  \App\User  $user
     * @param  \App\book  $book
     * @return mixed
     */
    public function restore(User $user, book $book)
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the book.
     *
     * @param  \App\User  $user
     * @param  \App\book  $book
     * @return mixed
     */
    public function forceDelete(User $user, book $book)
    {
      return false;
    }
}
