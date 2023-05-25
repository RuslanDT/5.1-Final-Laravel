<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Tablita</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <!-- Styles -->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>

<body>

    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Agregar Alumno
    </button>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Agregar Alumno</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('alumnos.store') }}" method="POST">
                        <input type="text" name="matricula" placeholder="Matrícula" value="{{ old('matricula') }}">
                        <input type="text" name="nombre" placeholder="Nombre" value="{{ old('nombre') }}">
                        <input type="date" name="fecha_nacimiento" placeholder="Fecha de nacimiento" value="{{ old('fecha_nacimiento') }}">
                        <input type="text" name="telefono" placeholder="Teléfono" value="{{ old('telefono') }}">
                        <input type="email" name="email" placeholder="Email (opcional)" value="{{ old('email') }}">
                        <select name="nivel_id" id="nivel_id">
                            <option value="nivel1" {{ old('nivel_id') == 1 ? 'selected' : '' }}>Primero</option>
                        </select>
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>



    <table class="table">
        <br>
        <thead>
            Alumnos
        </thead>
        <tbody>
            @foreach ($alumnos as $alumno)
            <tr>
                <td>{{$alumno->id}}</td>
                <td>{{$alumno->matricula}}</td>
                <td>{{$alumno->nombre}}</td>
                <td>{{$alumno->fecha_nacimiento}}</td>
                <td>{{$alumno->telefono}}</td>
                <td>{{$alumno->email ?? 'NA'}}</td>
                <td>
                    @if ($alumno ->nivel_id == 1)
                    Primero
                    @elseif ($alumno ->nivel_id == 2)
                    Segundo
                    @elseif ($alumno ->nivel_id == 3)
                    Tercero
                    @elseif ($alumno ->nivel_id == 4)
                    Cuarto
                    @elseif ($alumno ->nivel_id == 5)
                    Quinto
                    @elseif ($alumno ->nivel_id == 6)
                    Sexto
                    @elseif ($alumno ->nivel_id == 7)
                    Septimo
                    @elseif ($alumno ->nivel_id == 8)
                    Octavo
                    @elseif ($alumno ->nivel_id == 9)
                    Noveno
                    @endif
                </td>
                <td>
                    <button> Editar
                </td>
                <td>
                    <form action="{{ route('alumnos.destroy', $alumno->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Eliminar</button>
                    </form>
                </td>
                @endforeach
        </tbody>
    </table>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>


</body>

</html>