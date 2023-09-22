<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate">
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Expires" content="0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
    <style>
        .departamentos, .cargos {
            margin-top: 70px;
            width: 100%;
            height: auto;
            display: flex;
            flex-direction: column;
            gap: 30px;
            align-items: center;
            overflow: auto;
            margin-bottom: 40px;
        }

        .header {
            margin-bottom: 70px;
        }

        .table {
            width: 70%;
        }

        .tableTwo {
            width: 59%;
        }

        .td {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .actions {
            display: flex;
            justify-content: space-around;
            align-items: center;
        }

        .boton {
            width: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .sondeos_list {
            margin-top: 50px;
            width: 50%;
            margin: auto;
        }

    </style>
    <title>Document</title>
</head>
<body>
@if(session()->has('user'))
<header class="header bg-primary text-white py-3">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <section class="welcome">
                        <?php $user = session('user'); ?>
                        <p>Bienvenido, {{ $user->name }}</p>
                </section>
            </div>
            <div class="col-md-6 text-md-end">
                <section class="logout">
                        <form method="get" action="{{ route('user.logout') }}">
                            @csrf
                            <button type="submit" class="btn btn-light">Logout</button>
                        </form>
                </section>
            </div>
        </div>
    </div>
</header>
<section class="sondeos_list">
    @forelse($sondeos as $sondeo)
    <div class="card mb-3">
        <div class="card-header bg-primary text-white">
            <h4>{{$sondeo->titulo}}</h4>
        </div>
        <div class="card-body">
            <h6 class="card-title">{{$sondeo->categoria}}</h6>
            <p class="card-text">{{$sondeo->descripcion}}</p>
        </div>
        <div class="d-flex justify-content-between align-items-center p-3">
            <form action="{{route('ver_rtas_view', ['id' => $sondeo->id])}}" method="post">
                @csrf
                <button type="submit" class="btn btn-success">Ver respuestas</button>
            </form>
            <form action="{{ route('responderSondeo_view', ['id' => $sondeo->id, 'usuario' => $user->id]) }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-primary">Responder</button>
            </form>
        </div>
    </div>
    @empty
    <div class="alert alert-warning" role="alert">
        <h4 class="alert-heading">¡No se encontraron sondeos!</h4>
        <p class="mb-0">No hay sondeos disponibles en este momento.</p>
    </div>
    @endforelse
</section>


@else
    @guest

        <script>window.location.href = "{{ route('login_required') }}";</script>
    @endguest
@endif

</body>
</html>
