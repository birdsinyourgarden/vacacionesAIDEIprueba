<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        /* $users = User::get();

        return response()->json($users,200); */

        //si eres admin, llamas al index; si eres user, llamas al show
        if (auth()->check() && auth()->user()->isAdmin) {
            $users = User::get(); // obtener todos los usuarios
            $isAdmin = true; // establecer la variable $isAdmin como verdadera
        }

        if (!isset($isAdmin)) {
            $users = User::where('id', auth()->id())->get();
            $isAdmin = false; // establecer la variable $isAdmin como falsa
        }

        return response()->json([
            'users' => $users,
            'isAdmin' => $isAdmin
        ], 200);

    }
        

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
