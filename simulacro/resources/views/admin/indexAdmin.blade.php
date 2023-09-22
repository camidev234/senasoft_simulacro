<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Administrador</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Estilos personalizados */
        .header {
            background-color: #f8f9fa;
            padding: 20px;
            text-align: center;
        }

        .tittle {
            margin: 20px 0;
            text-align: center;
        }

        .sondeos,
        .crear-sondeo {
            margin-top: 20px;
            text-align: center;
        }

        .crear-sondeo a {
            text-decoration: none;
        }

        .table {
            width: 100%;
        }
    </style>
</head>
<body>
    <header class="header">
        <h2>Panel De Administrador</h2>
    </header>

    <section class="tittle">
        <h4>Gestión de usuarios</h4>
    </section>

    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th>Nombre</th>
                <th>Email</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse($ciudadanos as $c)
            <tr>
                <td>{{$c->name}}</td>
                <td>{{$c->email}}</td>
                <td>
                    <form action="{{route('admin.Delete_user', ['id' => $c->id])}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Eliminar</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="3">No se encontraron registros</td>
            </tr>
            @endforelse
        </tbody>
    </table>

    <section class="sondeos">
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th class="text-center align-middle">Categoria</th>
                    <th class="text-center align-middle">Titulo</th>
                    <th class="text-center align-middle">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse($sondeos as $sondeo)
                <tr>
                    <td>{{$sondeo->categoria}}</td>
                    <td>{{$sondeo->titulo}}</td>
                    <td class="text-center align-middle">
                        <form action="{{route('eliminar_sondeo_route', ['id' => $sondeo->id])}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Eliminar sondeo</button>
                        </form>
                        <form action="">
                            <button type="submit" class="btn btn-primary">Actualizar sondeo</button>
                        </form>
                        <form action="{{route('ver_rtas_view', ['id' => $sondeo->id])}}" method="post">
                            @csrf
                            <button type="submit" class="btn btn-success">Ver respuestas</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="3">No se encontraron sondeos</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </section>

    <section class="crear-sondeo">
        <a href="{{route('crear_sondeo_route')}}" class="btn btn-primary">Crear nuevo sondeo</a>
    </section>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
