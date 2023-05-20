<?php

namespace App\Http\Requests;

use App\Rules\UserPassword;
use Illuminate\Foundation\Http\FormRequest;

class UserPasswordRequest extends FormRequest
{


    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'oldPassword' => [new UserPassword],
            'firsPassword' => 'required|different:oldPassword|min:8',
            'secondPassword' => 'required|same:firsPassword|different:oldPassword|min:8',
        ];
    }
}
