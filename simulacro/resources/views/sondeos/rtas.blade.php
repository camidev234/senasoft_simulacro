<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Respuestas del Sondeo</title>
    <!-- Enlace al archivo CSS de Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <!-- Aplica clases de Bootstrap al contenedor view_responses -->
    <section class="view_responses container mt-5 mb-5">
        <div class="jumbotron">
            <h1 class="display-4">{{$sondeos->titulo}}</h1>
            <h4>{{$sondeos->descripcion}}</h4>
            <h5>Mostrando: {{count($respuestas)}} Respuestas</h5>
        </div>
        <section class="responses">
            @forelse($respuestas as $respuesta)
            <div class="card mb-3">
                <div class="card-body">
                    <h6 style="color: blue;">Respuesta de: {{$respuesta->usuario}}</h6>
                    <p class="card-text">{{$respuesta->respuesta}}</p>
                </div>
            </div>
            @empty
            <div class="alert alert-warning" role="alert">
                <h4 class="alert-heading">No se encontraron respuestas para este foro</h4>
                <p>¡Sé el primero en responder!</p>
            </div>
            @endforelse
        </section>
    </section>
</body>
</html>
