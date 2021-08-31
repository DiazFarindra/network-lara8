<?php

namespace App\Http\Controllers;

use App\Models\User;

class FollowingController extends Controller
{
    //
    public function __invoke(User $user, $follows)
    {
        $followersData = $follows === 'followers' ? $user->followers : $user->followed;

        if ($follows !== 'followers' && $follows !== 'following') {
            return \abort(404);
        }

        return \view('users.following',
        \compact('user', 'followersData'));
    }
}
