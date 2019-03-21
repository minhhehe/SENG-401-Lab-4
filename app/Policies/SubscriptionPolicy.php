<?php

namespace App\Policies;

use App\User;
use App\subscription;
use Illuminate\Auth\Access\HandlesAuthorization;

class SubscriptionPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the subscription.
     *
     * @param  \App\User  $user
     * @param  \App\subscription  $subscription
     * @return mixed
     */
    public function view(User $user, subscription $subscription)
    {
         return false;
    }

    /**
     * Determine whether the user can create subscriptions.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return false;
    }

    /**
     * Determine whether the user can update the subscription.
     *
     * @param  \App\User  $user
     * @param  \App\subscription  $subscription
     * @return mixed
     */
    public function update(User $user, subscription $subscription)
    {
        return false;
    }

    /**
     * Determine whether the user can delete the subscription.
     *
     * @param  \App\User  $user
     * @param  \App\subscription  $subscription
     * @return mixed
     */
    public function delete(User $user, subscription $subscription)
    {
        return false;
    }

    /**
     * Determine whether the user can restore the subscription.
     *
     * @param  \App\User  $user
     * @param  \App\subscription  $subscription
     * @return mixed
     */
    public function restore(User $user, subscription $subscription)
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the subscription.
     *
     * @param  \App\User  $user
     * @param  \App\subscription  $subscription
     * @return mixed
     */
    public function forceDelete(User $user, subscription $subscription)
    {
        return false;
    }
}
