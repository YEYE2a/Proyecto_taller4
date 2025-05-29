<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Listado de Solicitudes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>
<body>
<div class="container my-4">
    <h1>Listado de Solicitudes</h1>

    <!-- Mensaje de éxito -->
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('solicitudes.create') }}" class="btn btn-primary mb-3">Crear Nueva Solicitud</a>

    <table class="table table-bordered table-striped align-middle">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Tema</th>
                <th>Descripción</th>
                <th>Área</th>
                <th>Fecha Registro</th>
                <th>Fecha Cierre</th>
                <th>Estado</th>
                <th>Observaciones</th>
                <th>Usuario Ext.</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($solicitudes as $solicitud)
            <tr>
                <td>{{ $solicitud->id }}</td>
                <td>{{ $solicitud->tema }}</td>
                <td>{{ $solicitud->descripcion }}</td>
                <td>{{ $solicitud->area }}</td>
                <td>{{ $solicitud->fecha_registro->format('Y-m-d') }}</td>
                <td>{{ $solicitud->fecha_cierre ? $solicitud->fecha_cierre->format('Y-m-d') : '-' }}</td>
                <td>{{ $solicitud->estado }}</td>
                <td>{{ $solicitud->observaciones ?? '-' }}</td>
                <td>{{ $solicitud->usuario_ext ? 'Sí' : 'No' }}</td>
                <td>
                    <a href="{{ route('solicitudes.edit', $solicitud->id) }}" class="btn btn-warning btn-sm">Editar</a>
                    <form action="{{ route('solicitudes.destroy', $solicitud->id) }}" method="POST" style="display:inline-block">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
