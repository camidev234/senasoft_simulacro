<?php

namespace App\Http\Controllers;

use App\Models\Sondeos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class UsersController extends Controller
{
    //

    public function index_user(){
        $sondeos = Sondeos::join("categorias_sondeos", "categorias_sondeos.id", "=", "sondeos.id_categoria")->select("sondeos.titulo", "categorias_sondeos.categoria", "sondeos.id", "sondeos.descripcion")->get();
        return view('/user/indexUser', compact('sondeos'));
    }
    public function userSign(){
        // retorna la vista donde esta el formulario de registro
        return view('/user/signup');
    }

    // la funcion saveUser requiere los campos del formulario ($inputs)
    // esta funcion procesa los datos que introduce el usuario
    public function saveUser(Request $inputs){
        // se instancia un nuevo objeto User
        $new_user = new User();
        /**
         * a ese nuevo usuario se accede a el nombre que es la columna en la base de datos
         * despues esa columna va a ser igual a el request con el nombre del input del formulario.
         * en este caso el nombre del input es name
         * y asi para las demas columnas
         */
        $new_user->name = $inputs->name;
        $new_user->email = $inputs->email;
        $new_user->password = $inputs->contra;

        /**
         * al request se le realiza una validacion
         * al input name se le especifica que sea obligatorio
         * al contra igual y tambien que tenga al menos 8 caracteres
         * y al email solo obligatorio
         */

        $inputs->validate([
            'name' => ['required'],
            'contra' => ['required', 'min:8'],
            'email' => ['required']
        ]);

        // se guarda el nuevo usuario
        // por debajo save hace un INSERT
        $new_user->save();

        // retorna una ruta que es el formulario de inicio de sesion
        return redirect()->route('user.login_view');



    }

    public function userLogin(){
        return view('/user/login');
    }

    public function login(Request $request){
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

            return redirect()->route('index.User');
        }

        // Autenticación fallida
        return back()->withErrors(['email' => 'Correo electrónico o contraseña incorrectos']);
    }

    public function logout(Request $request){
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');

    }

    public function deleteUser($id){
        $usuario = User::findOrFail($id);

        $usuario->delete();

        return redirect()->route('index.Admin');
    }

    public function act_user($id){
        $usuario = User::findOrFail($id);
        return view('/user/actualizar_usuario', compact('usuario'));
    }
}
