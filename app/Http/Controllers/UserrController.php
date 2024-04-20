<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;

class UserrController extends Controller
{
    public function index()

    {
        $users = User::all();
        $roles = Role::all();

        return view('myviews.detail', compact("users","roles"));
    }
    public function storePivot(Request $request)
    {
        // return $request->input() ;
        $user = User::find($request->input("id"));
        $array=$request->input("roles");


        $user->roles()->sync($array);
        return redirect()->route("users.list");
    }
    public function store(Request $request){

        if (auth()->user()->can("create",User::class)) {
            $user = new User();
            $user->name = $request->nom;
            $user->email = $request->email;
            $user->password = bcrypt($request->password);
            $user->save();
            return redirect()->route("users.list");
        }else{
            return "Pas autoriser pour creé user" ;
        }

    }

    public function  details($id){

        $user = User::find($id);
        $roles =Role::all();

        return view('myviews.details', compact("user","roles"));
    }

    public function show(){
        return view('myviews.create');
    }

}
