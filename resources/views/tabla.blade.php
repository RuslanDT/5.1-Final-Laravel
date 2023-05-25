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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body class="px-5 bg-dark" style="height: 100vh;">
    <h1 class="text-center text-white mb-5">LISTADO DE ALUMNOS</h1>

    <div class="d-flex justify-content-center align-items-center mb-5">
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-success d-flex gap-2 justify-content-center align-items-center"
            data-bs-toggle="modal" data-bs-target="#exampleModal">
            <i class="fa-solid fa-user-plus fa-sm"></i>
            Agregar Alumno
        </button>
    </div>

    <!-- Modal Agregar-->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true"
        data-bs-theme="dark">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5  text-white" id="exampleModalLabel">AGREGAR ALUMNO</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('alumnos.store') }}" method="POST" class="row g-form">
                        @csrf
                        <div class="mb-3 col-12">
                            <label class="form-label text-white">Matrícula</label>
                            <input type="text" name="matricula" class="form-control" placeholder="Matrícula"
                                value="{{ old('matricula') }}" required>
                        </div>
                        @error('matricula')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        <div class="mb-3 col-12">
                            <label class="form-label text-white">Nombre</label>
                            <input type="text" name="nombre" class="form-control" placeholder="Nombre"
                                value="{{ old('nombre') }}" required>
                        </div>
                        @error('nombre')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        <div class="mb-3 col-6">
                            <label class="form-label text-white">Fecha de nacimiento</label>
                            <input type="date" name="fecha_nacimiento" class="form-control"
                                placeholder="Fecha de nacimiento" value="{{ old('fecha_nacimiento') }}" required>
                        </div>
                        @error('fecha_nacimiento')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        <div class="mb-3 col-6">
                            <label class="form-label text-white">Teléfono</label>
                            <input type="text" name="telefono" class="form-control" placeholder="Teléfono"
                                value="{{ old('telefono') }}" required>
                        </div>
                        @error('telefono')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        <div class="mb-3 col-6">
                            <label class="form-label text-white">Email</label>
                            <input type="email" name="email" class="form-control" placeholder="Email (opcional)"
                                value="{{ old('email') }}">
                        </div>
                        @error('email')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        <div class="mb-3 col-6">
                            <label class="form-label text-white">Nivel</label>
                            <select name="nivel_id" id="nivel_id" class="form-control" required>
                                <option value="1" {{ old('nivel_id') == 1 ? 'selected' : '' }}>Primero </option>
                                <option value="2" {{ old('nivel_id') == 2 ? 'selected' : '' }}>Segundo </option>
                                <option value="3" {{ old('nivel_id') == 3 ? 'selected' : '' }}>Tercero </option>
                                <option value="4" {{ old('nivel_id') == 4 ? 'selected' : '' }}>Cuarto </option>
                                <option value="5" {{ old('nivel_id') == 5 ? 'selected' : '' }}>Quinto </option>
                                <option value="6" {{ old('nivel_id') == 6 ? 'selected' : '' }}>Sexto </option>
                                <option value="7" {{ old('nivel_id') == 7 ? 'selected' : '' }}>Séptimo </option>
                                <option value="8" {{ old('nivel_id') == 8 ? 'selected' : '' }}>Octavo </option>
                                <option value="9" {{ old('nivel_id') == 9 ? 'selected' : '' }}>Noveno </option>
                            </select>
                        </div>
                        @error('nivel_id')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        <div class="d-flex justify-content-center align-items-end m-1">
                            <button type="submit" class="btn btn-success w-75">Guardar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Toast -->
    <div class="toast-container position-fixed bottom-0 end-0 p-3">
        @if (session('eliminado'))
            <div class="toast d-block" role="alert" aria-live="assertive" aria-atomic="true"
                data-bs-theme="dark">
                <div class="toast-header">
                    <strong class="me-auto">ELIMINADO</strong>
                    <small>ahora</small>
                    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
                <div class="toast-body text-secondary-emphasis">
                    {{ session('eliminado') }}
                </div>
            </div>
        @endif
        @if (session('agregado'))
            <div class="toast d-block" role="alert" aria-live="assertive" aria-atomic="true"
                data-bs-theme="dark">
                <div class="toast-header">
                    <strong class="me-auto">NUEVO ALUMNO</strong>
                    <small>ahora</small>
                    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
                <div class="toast-body text-secondary-emphasis">
                    {{ session('agregado') }}
                </div>
            </div>
        @endif
        @if (session('actualizado'))
            <div class="toast d-block" role="alert" aria-live="assertive" aria-atomic="true"
                data-bs-theme="dark">
                <div class="toast-header">
                    <strong class="me-auto">ALUMNO ACTUALIZADO</strong>
                    <small>ahora</small>
                    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
                <div class="toast-body text-secondary-emphasis">
                    {{ session('actualizado') }}
                </div>
            </div>
        @endif
    </div>


    @if ($alumnos->count() > 0)
        <table class="table table-dark table-hover table-bordered border-light table-striped mt-5">
            <thead>
                <tr>
                    <th class="text-center">ID</th>
                    <th class="text-center">MATRICULA</th>
                    <th class="text-center">NOMBRE</th>
                    <th class="text-center">FECHA DE NACIMIENTO</th>
                    <th class="text-center">TELEFONO</th>
                    <th class="text-center">EMAIL</th>
                    <th class="text-center">NIVEL</th>
                    <th class="text-center">OPCIONES</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($alumnos as $alumno)
                    <tr>
                        <td class="text-center">{{ $alumno->id }}</td>
                        <td class="text-center">{{ $alumno->matricula }}</td>
                        <td class="text-center">{{ $alumno->nombre }}</td>
                        <td class="text-center">{{ $alumno->fecha_nacimiento }}</td>
                        <td class="text-center">{{ $alumno->telefono }}</td>
                        <td class="text-center">{{ $alumno->email ?? 'NA' }}</td>
                        <td class="text-center">
                            @if ($alumno->nivel_id == 1)
                                Primero
                            @elseif ($alumno->nivel_id == 2)
                                Segundo
                            @elseif ($alumno->nivel_id == 3)
                                Tercero
                            @elseif ($alumno->nivel_id == 4)
                                Cuarto
                            @elseif ($alumno->nivel_id == 5)
                                Quinto
                            @elseif ($alumno->nivel_id == 6)
                                Sexto
                            @elseif ($alumno->nivel_id == 7)
                                Septimo
                            @elseif ($alumno->nivel_id == 8)
                                Octavo
                            @elseif ($alumno->nivel_id == 9)
                                Noveno
                            @endif
                        </td>
                        <td class="d-flex gap-2 justify-content-center align-items-center">
                            <button type="button" class="btn btn-outline-warning w-auto" data-bs-toggle="modal"
                                data-bs-target="#modalEditar{{ $alumno->id }}">
                                <i class="fa-solid fa-pencil"></i>
                            </button>
                            <form action="{{ route('alumnos.destroy', $alumno->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-outline-danger w-auto">
                                    <i class="fa-regular fa-trash-can"></i>
                                </button>
                            </form>
                            <!-- Modal Editar-->
                            <div class="modal fade" id="modalEditar{{ $alumno->id }}" tabindex="-1" aria-labelledby="modalEditar{{ $alumno->id }}Label" aria-hidden="true"
                                data-bs-theme="dark">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5  text-white" id="modalEditar{{ $alumno->id }}Label">EDITAR ALUMNO</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ route('alumnos.update', $alumno->id) }}" method="POST" class="row">
                                                @csrf
                                                @method('PUT')
                                                <div class="mb-3 col-12">
                                                    <label class="form-label">Matrícula</label>
                                                    <input type="text" name="matricula" class="form-control"
                                                        placeholder="Matrícula" value="{{ $alumno->matricula }}"
                                                        required>
                                                </div>
                                                @error('matricula')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                                <div class="mb-3 col-12">
                                                    <label class="form-label">Nombre</label>
                                                    <input type="text" name="nombre" class="form-control"
                                                        placeholder="Nombre" value="{{ $alumno->nombre }}"
                                                        required>
                                                </div>
                                                @error('nombre')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                                <div class="mb-3 col-6">
                                                    <label class="form-label">Fecha de nacimiento</label>
                                                    <input type="date" name="fecha_nacimiento"
                                                        class="form-control" placeholder="Fecha de nacimiento"
                                                        value="{{ $alumno->fecha_nacimiento }}" required>
                                                </div>
                                                @error('fecha_nacimiento')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                                <div class="mb-3 col-6">
                                                    <label class="form-label">Teléfono</label>
                                                    <input type="text" name="telefono" class="form-control"
                                                        placeholder="Teléfono" value="{{ $alumno->telefono }}"
                                                        required>
                                                </div>
                                                @error('telefono')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                                <div class="mb-3 col-6">
                                                    <label class="form-label">Email (opcional)</label>
                                                    <input type="email" name="email" class="form-control"
                                                        placeholder="Email (opcional)"
                                                        value="{{ $alumno->email }}">
                                                </div>
                                                @error('email')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                                <div class="mb-3 col-6">
                                                    <label class="form-label">ID de nivel</label>
                                                    <select name="nivel_id" id="nivel_id" class="form-control"
                                                        required>
                                                        <option value="1"{{ $alumno->nivel_id == 1 ? 'selected' : '' }}>Primero</option>
                                                        <option value="2" {{ $alumno->nivel_id == 2 ? 'selected' : '' }}>Segundo</option>
                                                        <option value="3"{{ $alumno->nivel_id == 3 ? 'selected' : '' }}>Tercero</option>
                                                        <option value="4"{{ $alumno->nivel_id == 4 ? 'selected' : '' }}>Cuarto</option>
                                                        <option value="5"{{ $alumno->nivel_id == 5 ? 'selected' : '' }}>Quinto</option>
                                                        <option value="6"{{ $alumno->nivel_id == 6 ? 'selected' : '' }}>Sexto</option>
                                                        <option value="7"{{ $alumno->nivel_id == 7 ? 'selected' : '' }}>Séptimo</option>
                                                        <option value="8"{{ $alumno->nivel_id == 8 ? 'selected' : '' }}>Octavo</option>
                                                        <option value="9"{{ $alumno->nivel_id == 9 ? 'selected' : '' }}>Noveno</option>
                                                    </select>
                                                </div>
                                                @error('nivel_id')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                                <div class="d-flex justify-content-center align-items-end m-1">
                                                    <button type="submit" class="btn btn-success w-75">Guardar</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                @endforeach
            </tbody>
        </table>
    @else
        <div class="w-100 h-75 d-flex flex-column justify-content-center align-items-center">
            <h2 class="text-secondary">LO SIENTO, NO HAY DATOS :C</h2>
            <i class="fa-solid fa-heart-crack fa-2xl text-secondary"></i>
        </div>
    @endif


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js"
        integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js"
        integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/js/all.min.js"></script>

</body>

</html>
