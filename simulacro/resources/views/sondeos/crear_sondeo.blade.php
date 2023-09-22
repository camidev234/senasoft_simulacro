<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Sondeo</title>
    <!-- Agregar enlace al archivo CSS de Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        /* Estilo personalizado para centrar el formulario */
        .center-form {
            display: flex;
            justify-content: center;
            align-items: center;
            width: 50%;
            margin: auto;
            height: 100vh; /* Ajustar la altura al 100% del viewport */
        }

        /* Estilo personalizado para aumentar el ancho de los input */
        .custom-input {
            width: 550px; /* Ancho del 100% del contenedor */
        }
    </style>
</head>
<body>
    <div class="container center-form">
        <div class="row">
            <div class="col-md-6">
                <h1>Crear Sondeo</h1>
                <form action="{{ route('salvar_sondeo_route') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="select_categoria">Categoría del sondeo</label>
                        <select class="form-control custom-input" id="select_categoria" name="select_categoria">
                            @forelse($categorias as $cat)
                            <option value="{{$cat->id}}">{{$cat->categoria}}</option>
                            @empty
                            <option value="">No hay categorías</option>
                            @endforelse
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="titulo">Título del sondeo</label>
                        <input type="text" class="form-control custom-input" id="titulo" placeholder="Título" name="titulo">
                    </div>
                    <div class="form-group">
                        <label for="descripcion">Descripción</label>
                        <input type="text" class="form-control custom-input" id="descripcion" placeholder="Descripción" name="descripcion">
                    </div>
                    <button type="submit" class="btn btn-primary">Crear sondeo</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
