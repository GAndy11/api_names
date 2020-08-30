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

        
        foreach ($personas as $persona) 
        {
            
            if($persona->nombre_completo == $request->nombre_completo)
            {    
                array_push(
                    $datos,
                    [
                        "nombre_completo" => $persona->nombre_completo,
                        "porcentaje" => $persona->porcentaje
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
