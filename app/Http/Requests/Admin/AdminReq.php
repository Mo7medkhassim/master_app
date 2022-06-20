<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class AdminReq extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:admins',
            'password' => 'required|confirmed',
            'image' => 'image',
            'permissions' => 'required|min:1',
        ];
    }
}
