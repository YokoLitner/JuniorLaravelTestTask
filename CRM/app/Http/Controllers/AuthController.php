<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public  function register(Request $request)
    {
        $data = $request->validate([
            "name" => ["required","string"],
            "lastname" =>["required","string"],
            "phone" => ["required","size:11"],// Here i can use ReGex, to validate the phone number, but IDK main country.
            "email" => ["required","email","string","unique:users,email"],
            "password" => ["required","confirmed"]
        ]);

        $user = User::create([
            "name" => $data["name"],
            "last name" => $data["lastname"],
            "phone" => $data["phone"],
            "email" => $data["email"],
            "password" => bcrypt($data["password"])
        ]);

        if($user){
            auth("web")->login($user);
        }

        return redirect(route("home"));
    }

    public  function  login(Request $request)
    {
        $data = $request->validate([
            "email" => ["required","email","string"],
            "password" => ["required"]
        ]);

        if(auth("web")->attempt($data)){
            return redirect(route("home"));
        }

        return redirect(route("login"))->withErrors(["email"=>"The user does not exist or incorrect data is entered"]);
    }

    public function logout()
    {
        auth("web")->logout();

        return redirect(route("home"));
    }
}
