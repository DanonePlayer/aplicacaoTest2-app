<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{

    public $user;
    public function __construct(User $user)
    {
        $this->user = new User();
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('register');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // var_dump($request->except(["_token"]));
        $created = $this->user->create([
            "name" => $request->input("name"),
            "email"  => $request->input("email"),
            "password" => password_hash($request->input("password"), PASSWORD_DEFAULT),
        ]);

        if ($created) {
            return redirect()->back()->with("message", "Successfully create");
        }

        return redirect()->back()->with("message", "Erro create");
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
