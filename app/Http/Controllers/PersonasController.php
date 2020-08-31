<?php

namespace App\Http\Controllers;

use App\Personas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

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
        $contadorCoincidencias = 0;
        $datos = [];
        $mensaje = "";

        $nombreRequest = $request->nombre_completo;
        
        if(count($personas) > 0)
        {
            foreach ($personas as $persona) 
            {
                
                $nombrePersonaAPI = $persona->nombre_completo;
                    
                similar_text($nombreRequest, $nombrePersonaAPI, $porcSimilitud); //Función recomendada para la funcionalidad
    
                // Validar similitudes que llegan con las que se esperan en BD y en consulta a la API
                if($porcSimilitud >= $request->porcentaje)    
                {
                    $contadorCoincidencias ++;
                    
                    array_push(
                        $datos,
                        [   
                            "nombre_buscado" => $request->nombre_completo,
                            "porcentaje_buscado" => $request->porcentaje,
                            "nombre_encontrado" => $persona->nombre_completo,
                            "porcentaje_encontrado" => $porcSimilitud,
                            "departamento" => $persona->departamento,
                            "localidad" => $persona->localidad,
                            "municipio" => $persona->municipio,
                            "anos_activo" => $persona->anos_activo,
                            "tipo_persona" => $persona->tipo_persona,
                            "tipo_cargo" => $persona->tipo_cargo
                        ]
                    );

                    Log::info('Se realizó una busqueda de nombres. Nombre buscado : ' . $request->nombre_completo . ' Porcentaje buscado : ' . $request->porcentaje . ' Nombre encontrado: ' . $persona->nombre_completo . ' Porcentaje encontrado: ' . $porcSimilitud);
                }
                  
            }

            $mensaje = $contadorCoincidencias > 0 ? "Exito, coincidencias encontradas" : "Exito, coincidencias no encontradas";

            if ($contadorCoincidencias > 0) {
                $mensaje = "Exito, coincidencias encontradas";
            }else{
                $mensaje = "Exito, coincidencias no encontradas";
                Log::info('Se realizó una busqueda de nombres. Nombre buscado : ' . $request->nombre_completo . ' Porcentaje buscado : ' . $request->porcentaje . ' No se encontraton coincidencias en la BD');
            }


        }else
        {
            $mensaje = "No hay datos dentro de la BD";
        }
        
        $data = [
            "mensaje" => $mensaje,
            "resultado" => $datos
        ];

        return json_encode($data);
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
