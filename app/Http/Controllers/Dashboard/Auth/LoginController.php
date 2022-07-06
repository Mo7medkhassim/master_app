<?php

namespace App\Http\Controllers\Dashboard\Auth;

use App\Models\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;

use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{


    public function login(Request $request)
    {
        // validations
        if ($request->isMethod('post')) {

            $rules = [
                "email" => "required",
                "password" => "required"
            ];

            $validator = Validator::make($request->all(), $rules);

            if ($validator->fails()) {

                return back()->withErrors($validator->errors())->withInput();

            }


            if (Auth::guard('admin')->attempt($request->only('email', 'password'))) {

                return redirect()->route('dashboard.home');
            } else {

                return redirect()->back()->with('123');
            }
        }

        return  view('dashboard.auth.login');
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect('/dashboard/login');
    }
}
