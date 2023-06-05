<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ConnexionController extends Controller
{
    public function show()
    {
        return view("connexion.show");
    }

    public function login(Request $request)
    {
        $request->validate([
            "email" => "bail|required|email",
            "password" => "bail|required"
        ]);

        if (Auth::guard("web")->attempt(["email" => $request->email, "password" => $request->password])) {
            $request->session()->regenerate();
            return redirect()->intended();
        }
        return back()->withErrors([
            'email' => 'Adresse email or password invalide!',
        ])->onlyInput('email');
    }
}
