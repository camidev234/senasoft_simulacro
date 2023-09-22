<?php

namespace App\Http\Controllers;

use App\Models\Sondeos;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AdministradoresController extends Controller
{
    //

    public function indexAdmin(){
        $sondeos = Sondeos::join("categorias_sondeos", "categorias_sondeos.id", "=", "sondeos.id_categoria")->select("sondeos.titulo", "categorias_sondeos.categoria", "sondeos.id")->get();
        $ciudadanos = User::all();
        return view('/admin/indexAdmin', compact('ciudadanos', 'sondeos'));
    }

    public function login(){
        return view('/admin/login');
    }

    public function loginAdmin(Request $request){
        $credentials = $request->only('email', 'password');

        $request->validate([
            'email' => ['required'],
            'password' => ['required']
        ]);

        if (Auth::attempt($credentials)) {
            // Autenticación exitosa
            $user = Auth::user();

            // Guarda la variable en la sesión
            session(['user' => $user]);

            return redirect()->route('index.Admin');
        }

        // Autenticación fallida
        return back()->withErrors(['email' => 'Correo electrónico o contraseña incorrectos']);
    }

}
