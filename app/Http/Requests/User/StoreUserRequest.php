<?php

namespace App\Http\Requests\User;

use App\Http\Requests\BaseRequest;

class StoreUserRequest extends BaseRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name'        => 'required|string|max:255',
            'email'       => 'required|email|unique:users,email',
            'password'    => 'required|string|min:6|confirmed',
        ];
    }
}
