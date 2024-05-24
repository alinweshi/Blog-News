<?php

namespace App\Policies;

use App\Models\User;
use App\Models\post;
use Illuminate\Auth\Access\Response;

class PostPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, post $post): bool
    {
        //
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, post $post): bool
    {
        return $user->id === $post->user_id;
        //This method checks whether the user's ID matches the post's user ID. If they match, the user is authorized to update the post.
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Post $post)
    {
        return $user->isAdmin();
    }
    public function createComment(User $user, Post $post)
{
    return $user->isVerified();
}

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, post $post): bool
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, post $post): bool
    {
        //
    }
}
