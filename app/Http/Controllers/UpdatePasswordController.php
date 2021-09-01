<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdatePasswordRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class UpdatePasswordController extends Controller
{
    //
    public function edit()
    {
        return \view('users.password.edit');
    }

    //
    public function update(UpdatePasswordRequest $request)
    {
        if (!Hash::check($request->current_password, \auth()->user()->password)) {
            throw ValidationException::withMessages([
                'current_password' => 'Your current password doesn\'t match with our record!'
            ]);
        }

        \auth()->user()->update(['password' => Hash::make($request->password)]);
        return \redirect()->route('profile', \auth()->user()->username)->with('success', 'password updated!');
    }
}
