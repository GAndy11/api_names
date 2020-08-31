<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Prueba STRADATA</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    </head>
    <body>
        <div class="container">
            <div class="row cabecera">
                <div class="col-md-12">
                    <h1>Buscador de Nombres</h1>
                </div>
            </div>
            <div class="contenido">
                <form action="/" method="GET">
                    @csrf
                    <div class="row">
                        <div class="col-md-3">
                            <label for="nombre_completo">Nombres y apellidos</label>
                            <input type="text" class="form-control" name="nombre_completo" id="nombre_completo" name="nombre_completo" value="{{ isset($persona_buscada) ? $persona_buscada : '' }}">
                        </div>

                        <div class="col-md-3">
                            <label for="porcentaje">Porcentaje conincidencia</label>
                            <input type="text" class="form-control" name="porcentaje" id="porcentaje" name="porcentaje" value="{{ isset($porcentaje_buscado) ? $porcentaje_buscado : '' }}">
                        </div>

                    </div>
                    @if(isset($personas) && count($personas) > 0)
                        <br>
                        <div class="alert alert-primary" role="alert">
                            {{ $mensaje }}
                        </div>
                    @elseif (isset($personas) && count($personas) == 0)
                    <br>
                        <div class="alert alert-warning" role="alert">
                            {{ $mensaje }}
                        </div>
                    @endif
                    <br>
                    <button class="btn btn-primary">Buscar</button>
                </form>
                <br>
                <br>
                @if(isset($personas) && count($personas) > 0)
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table table-striped">
                                <thead class="thead-dark">
                                    <tr>
                                    <th scope="col">Nombre </th>
                                    <th scope="col">Tipo persona</th>
                                    <th scope="col">Tipo cargo</th>
                                    <th scope="col">Departamento</th>
                                    <th scope="col">Municipio</th>
                                    <th scope="col">% Coincidencia</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($personas as $persona)
                                        <tr>
                                            <th scope="row">{{ $persona->nombre_encontrado }}</th>
                                            <td>{{ $persona->tipo_persona }}</td>
                                            <td>{{ $persona->tipo_cargo }}</td>
                                            <td>{{ $persona->departamento }}</td>
                                            <td>{{ $persona->municipio }}</td>
                                            <td>{{ $persona->porcentaje_encontrado }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                @endif
                
            </div>
        </div>
    </body>
</html>
