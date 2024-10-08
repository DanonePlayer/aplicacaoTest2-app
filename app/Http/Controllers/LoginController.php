<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
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
        $users = $this->user->all();
        return view('login', ['users' => $users]);
    }

    // /**
    //  * Show the form for creating a new resource.
    //  */
    // public function create()
    // {
    //     return view("register");
    // }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "email" => "required|email",
            "password" => "required|min:8"

        ],[
            "email.required" => "Esse campo de email é obrigatorio",
            "email.email" => "Esse campo tem que ter um email válido",
            "password.required" => "Esse campo de senha é obrigatorio",
            "password.password" => "Esse campo tem que ter uma senha válida",
            "password.min" => "Esse campo tem que ter no mínimo 8 caracteres"
        ]);

        $credentials = $request->only("email", "password");
        $authenticated = Auth::attempt($credentials);

        if(!$authenticated){
            return redirect()->route("login.index")->withErrors(["error" => "Email or password invalid"]);
        }

        return redirect()->route("login.index")->with("success", "Logged in");
    }

    /**
     * Display the specified resource.
     */
    public function show(user $login)
    {
        return view("user_show", ["user" => $login]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(user $login)
    {
        return view("user_edit", ["user" => $login]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $updated = $this->user->where("id", $id)->update($request->except(["_token", "_method"]));
        if ($updated) {
            return redirect()->back()->with("message", "Successfully update");
        }

        return redirect()->back()->with("message", "Erro update");
    }

    public function logout(){
        Auth::logout();

        return redirect()->route("login.index");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $delete = $this->user->where("id", $id)->delete();

        return redirect()->route('login.index');
    }
}
