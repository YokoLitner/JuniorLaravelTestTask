<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function showHomePage()
    {
        return view("welcome");
    }

    public function  showLoginForm()
    {
        return view("auth.login");
    }

    public  function  showRegisterForm()
    {
        return view("auth.register");
    }
}
