<?php

namespace App\Http\Controllers;
use App\Models\Role;
use App\Models\Produit;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index()
    {
        // $roles = Role::all();
        // return view('myviews.role', ['roles' => $roles]);
    }

    public function create()
    {
        $products = Produit::all();
        return view('myviews.role', compact('products'));
    }

    public function store(Request $request)
    {
        if (auth()->user()->type === "super") {
           
            $validatedData = $request->validate([
                'nn' => 'required|string',
                'role_name' => 'required|string',
                'model' => 'required|string',
                'permissions' => 'required|string',
            ]);
            // dd($validatedData);
            Role::create([
                'nom' => $validatedData['nn'],
                'alias' => $validatedData['role_name'],
                'model' => $validatedData['model'],
                'permissions' => $validatedData['permissions'],
            ]);
    
            return "Role created successfully!";
        } else {
            return "Not authorized";
        }
    }
    
}
