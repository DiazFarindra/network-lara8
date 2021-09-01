<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UpdateProfileRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return \true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|string',
            'username' => ['required', 'string', 'alpha_dash', 'unique:users,username,' . \auth()->id()],
            'email' => ['required', 'string', 'email', 'unique:users,email,' . \auth()->id()],
        ];
    }

    public function updated()
    {
        return Auth::user()->update($this->validated());
    }
}
