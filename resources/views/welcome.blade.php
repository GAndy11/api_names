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
                <form action="">
                    <div class="row">
                        <div class="col-md-3">
                            <label for="nombre_completo">Nombres y apellidos</label>
                            <input type="text" class="form-control" name="nombre_completo" id="nombre_completo" name="nombre_completo">
                        </div>

                        <div class="col-md-3">
                            <label for="porcentaje">Porcentaje conincidencia</label>
                            <input type="text" class="form-control" name="porcentaje" id="porcentaje" name="porcentaje">
                        </div>
                    </div>
                    <br>
                    <button class="btn btn-primary">Buscar</button>
                </form>
                
            </div>
        </div>
    </body>
</html>
