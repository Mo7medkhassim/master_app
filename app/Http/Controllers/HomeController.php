<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function index()
    {
        return view('home');
    }

    public function sendForm () {

        return view('site.form');
    }

    public function test1(Request $request) {
        return $request -> all();
    }

    public function test2(Request $request) {
        return $request -> all();
    }
}
