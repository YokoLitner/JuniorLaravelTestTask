<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $worker = User::all();
        return view('index',compact('worker'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            "name" => ["required","string"],
            "lastname" =>["required","string"],
            "phone" => ["required","size:11"],// Here i can use ReGex, to validate the phone number, but IDK main country.
            "email" => ["required","email","string","unique:users,email"],
            "password" => ["required","confirmed"]
        ]);

        $worker = User::create([
            "name" => $data["name"],
            "last name" => $data["lastname"],
            "phone" => $data["phone"],
            "email" => $data["email"],
            "password" => bcrypt($data["password"])
        ]);

        if($worker) {
            return redirect(route("workers"))->with('completed', 'Workers has been saved!');
        }else{
            return redirect(route("workers"))->with('error', 'Workers has been not saved!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $worker = User::findOrFail($id);
        return view('edit', compact('worker'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->validate([
            "name" => ["required","string"],
            "lastname" =>["required","string"],
            "phone" => ["required","size:11"],// Here i can use ReGex, to validate the phone number, but IDK main country.
            "email" => ["required","email","string","unique:users,email"],
            "password" => ["required","confirmed"]
        ]);
        User::whereId($id)->update($data);
        return redirect(route("students"))->with('completed', 'Worker has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $worker = User::findOrFail($id);
        $worker->delete();

        return redirect('/workers')->with('completed', 'Worker has been deleted');
    }
}
