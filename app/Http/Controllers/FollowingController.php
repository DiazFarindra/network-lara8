<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

    public function store(Request $request, User $user)
    {
        Auth::user()->follow($user);
        return \redirect()->back()->with('success', 'followed!');
    }
}
