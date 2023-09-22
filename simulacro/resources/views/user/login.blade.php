<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
    <style>
        .login {
            width: 100%;
            height: 70vh;
            display: flex;
            justify-content: space-around;
            align-items: center;
            flex-direction: column;
        }

        form {
            width: 50%;
        }
    </style>
    <title>Document</title>
</head>
<body>
<section class="login">
    <h1>Login de usuario</h1>
    <form action="{{route('authuser_route')}}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="email" class="form-label">Email:</label>
            <input type="email" class="form-control" name="email" id="email" value="{{old('email')}}">
            @error('email')
                <br>
                <small style="color: red;">Debes escribir el email</small>
            @enderror
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Contraseña:</label>
            <input type="password" class="form-control" name="password" id="password" value="{{old('password')}}">
            @error('password')
                <br>
                <small style="color: red;">Debes escribir la contraseña</small>
            @enderror
        </div>
        <div class="mb-3">
            <button type="submit" class="btn btn-primary">Iniciar sesión</button>
        </div>
    </form>
</section>

</body>
</html>
