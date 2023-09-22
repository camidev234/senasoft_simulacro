<?php

namespace App\Http\Controllers;

use App\Models\CategoriasSondeos;
use App\Models\RespuestasSondeos;
use App\Models\Sondeos;
use Illuminate\Http\Request;

class SondeosController extends Controller
{
    //

    public function crear_sondeo(){
        $categorias = CategoriasSondeos::all();
        return view('/sondeos/crear_sondeo', compact('categorias'));
    }

    public function salvar_sondeo(Request $campos){
        $nuevo_sondeo = new Sondeos();

        $nuevo_sondeo->id_categoria = $campos->select_categoria;
        $nuevo_sondeo->titulo = $campos->titulo;
        $nuevo_sondeo->descripcion = $campos->descripcion;


        // $campos->validate([
        //     'titulo' => ['required'],
        //     'descripcion' => ['required']
        // ]);
        $nuevo_sondeo->save();

        return redirect()->route('index.Admin');
    }

    public function eliminar_sondeo($id){
        $sondeo = Sondeos::findOrFail($id);

        $sondeo->delete();

        return redirect()->route('index.Admin');
    }

    public function ver_respuestas($id){
        $sondeos = Sondeos::findOrFail($id);
        $respuestas = RespuestasSondeos::join("sondeos", "sondeos.id", "=", "respuestas_sondeos.id_sondeo")->join("users", "respuestas_sondeos.id_usuario", "=", "users.id")->select("sondeos.titulo", "respuestas_sondeos.respuesta", "users.name AS usuario")->where("respuestas_sondeos.id_sondeo", "=", $id)->get();

        return view('/sondeos/rtas', compact('respuestas', 'sondeos'));
    }
}
