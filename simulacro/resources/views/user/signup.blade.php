<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
    <style>

        .sign {
            width: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 30px;
        }
        form {
            width: 50%;
            margin: auto;
            margin-top: 70px;
        }
    </style>
    <title>Document</title>

</head>
<body>
<section class="sign">
    <h1>Registrar usuario</h1>
</section>

<section>
    <form action="{{route('user.save_user')}}" method="post">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Nombre:</label>
            <input type="text" class="form-control" name="name" placeholder="nombre" value="{{old('name')}}">
            @error('name')
                <br>
                <small style="color: red;">El nombre es requerido</small>
            @enderror
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email:</label>
            <input type="email" class="form-control" name="email" placeholder="Correo Electronico" value="{{old('email')}}">
            @error('email')
                <br>
                <small style="color: red;">El email es requerido</small>
            @enderror
        </div>
        <div class="mb-3">
            <label for="contra" class="form-label">Contraseña:</label>
            <input type="password" class="form-control" name="contra" placeholder="contraseña" value="{{old('contra')}}">
            @error('contra')
                <br>
                <small style="color: red;">{{$message}}</small>
            @enderror
        </div>
        <div class="mb-3">
            <input type="submit" class="btn btn-primary" value="Crear usuario">
        </div>
    </form>

    <div>
        <a href="{{route('user.login_view')}}" class="center">Iniciar sesion</a>
    </div>
</section>
</body>
</html>