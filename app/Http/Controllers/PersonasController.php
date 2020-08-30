<?php

namespace App\Http\Controllers;

use App\Personas;
use Illuminate\Http\Request;
use stdClass;

class PersonasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        //Consulta de personas
        $personas = Personas::all();
        $datos = [];

        $nombreRequest = $request->nombre_completo;
        
        foreach ($personas as $persona) 
        {
            
            $nombrePersonaAPI = $persona->nombre_completo;

            similar_text($nombreRequest, $nombrePersonaAPI, $porcSimilitud); //Función recomendada para la funcionalidad

            if($porcSimilitud >= $persona->porcentaje && $porcSimilitud >= $request->porcentaje)
            {
                array_push(
                    $datos,
                    [   
                        "nombre_buscado" => $request->nombre_completo,
                        "porcentaje_buscado" => $request->porcentaje,
                        "nombre_encontrado" => $persona->nombre_completo,
                        "porcentaje_encontrado" => $persona->porcentaje
                    ]
                );
            }
              
        }

        return json_encode($datos);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Creación de personas
        $persona = Personas::create($request->all());
        return $persona;
    }

}
