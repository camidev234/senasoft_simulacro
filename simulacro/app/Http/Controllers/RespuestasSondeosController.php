<?php

namespace App\Http\Controllers;

use App\Models\RespuestasSondeos;
use App\Models\Sondeos;
use App\Models\User;
use Illuminate\Http\Request;

use function Ramsey\Uuid\v1;

class RespuestasSondeosController extends Controller
{

    public function responder($id, $usuario){
        $sondeo = Sondeos::findOrFail($id);
        $usuario = User::findOrFail($usuario);

        return view('/sondeos/responderSondeo', compact('sondeo', 'usuario'));
    }


    public function crear_respuesta(Request $campos, $id, $usuario){
        $nueva_respuesta = new RespuestasSondeos();

        $nueva_respuesta->id_sondeo = $id;
        $nueva_respuesta->id_usuario = $usuario;
        $respuesta = ucfirst($campos->respuesta);
        $nueva_respuesta->respuesta = $respuesta;

        $nueva_respuesta->save();

        return redirect()->route('index.User');
    }
}
