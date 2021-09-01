<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateProfileRequest;
use App\Models\User;

class UpdateProfileInformationController extends Controller
{
    //
    public function edit(User $user)
    {
        return \view('users.edit', \compact('user'));
    }

    //
    public function update(UpdateProfileRequest $request)
    {
        $request->updated();
        return \redirect()->route('profile', \auth()->user()->username)->with('success', 'user updated!');
    }
}
