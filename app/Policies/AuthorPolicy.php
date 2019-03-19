<?php

namespace App\Policies;

use App\User;
use App\Author;
use Illuminate\Auth\Access\HandlesAuthorization;

class AuthorPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the author.
     *
     * @param  \App\User  $user
     * @param  \App\Author  $author
     * @return mixed
     */
    public function view(User $user, Author $author)
    {
        return $user->role == 'subscriber';
    }

    /**
     * Determine whether the user can create authors.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
      return true;
    }

    /**
     * Determine whether the user can update the author.
     *
     * @param  \App\User  $user
     * @param  \App\Author  $author
     * @return mixed
     */
    public function update(User $user, Author $author)
    {
      return false;
    }

    /**
     * Determine whether the user can delete the author.
     *
     * @param  \App\User  $user
     * @param  \App\Author  $author
     * @return mixed
     */
    public function delete(User $user, Author $author)
    {
        return true;
    }

    /**
     * Determine whether the user can restore the author.
     *
     * @param  \App\User  $user
     * @param  \App\Author  $author
     * @return mixed
     */
    public function restore(User $user, Author $author)
    {
        return true;
    }

    /**
     * Determine whether the user can permanently delete the author.
     *
     * @param  \App\User  $user
     * @param  \App\Author  $author
     * @return mixed
     */
    public function forceDelete(User $user, Author $author)
    {
      return true;
    }
}
