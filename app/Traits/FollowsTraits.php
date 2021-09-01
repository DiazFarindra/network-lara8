<?php

namespace App\Traits;

use App\Models\User;

/**
 * trait for followings/followers reusable code
 */
trait FollowsTraits
{

    public function followers()
    {
        return $this->belongsToMany(
            User::class,
            'follows',
            'following_user_id',
            'user_id'
        )->withTimestamps();
    }

    public function followed()
    {
        return $this->belongsToMany(
            User::class,
            'follows',
            'user_id',
            'following_user_id'
        )->withTimestamps();
    }

    public function follow(User $user)
    {
        return $this->followed()->toggle($user);
    }
}

