<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Responder sondeo: {{$sondeo->titulo}}</h1>

    <form action="{{route('sondeo_salvar_rta', ['id' => $sondeo->id, 'usuario' => $usuario->id])}}" method="POST">
        @csrf
        <label for="">Escriba aca su opinion:</label><br>
        <textarea name="respuesta" id="" cols="30" rows="10"></textarea><br>
        <input type="submit" value="Participar">
    </form>
</body>
</html>
