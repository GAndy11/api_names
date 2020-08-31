<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Http;

use function GuzzleHttp\json_encode;

class BuscadorController extends Controller
{
    /**
     * Display a listing of a names
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        
        if(isset($request->nombre_completo) && isset($request->porcentaje)){
            $response = Http::get('http://127.0.0.1:8001/api/personas', [
                'nombre_completo' => $request->nombre_completo,
                'porcentaje' => $request->porcentaje
            ]);

            $data = json_decode($response->body())->resultado;
            $mensaje = json_decode($response->body())->mensaje;

            return view('buscar', [
                "personas" => $data,
                "mensaje" => $mensaje,
                "persona_buscada" => $request->nombre_completo,
                "porcentaje_buscado" => $request->porcentaje,
            ]);
            
        }

        return view('buscar');
        
    }
}
