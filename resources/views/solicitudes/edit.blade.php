<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Solicitud</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <h2 class="mb-4">Editar Solicitud</h2>

    <form action="{{ route('solicitudes.update', $solicitud->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="tema" class="form-label">Tema</label>
            <input type="text" name="tema" class="form-control" value="{{ old('tema', $solicitud->tema) }}" required>
            @error('tema') <div class="text-danger">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label for="descripcion" class="form-label">Descripción</label>
            <textarea name="descripcion" class="form-control" rows="3" required>{{ old('descripcion', $solicitud->descripcion) }}</textarea>
            @error('descripcion') <div class="text-danger">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label for="area" class="form-label">Área</label>
            <select name="area" class="form-select" required>

                <option value="TI" {{ old('area', $solicitud->area) == 'TI' ? 'selected' : '' }}>TI</option>
                <option value="Contabilidad" {{ old('area', $solicitud->area) == 'Contabilidad' ? 'selected' : '' }}>Contabilidad</option>
                <option value="Administrativo" {{ old('area', $solicitud->area) == 'Administrativo' ? 'selected' : '' }}>Administrativo</option>
                <option value="Operativo" {{ old('area', $solicitud->area) == 'Operativo' ? 'selected' : '' }}>Operativo</option>
            </select>
            @error('area') <div class="text-danger">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label for="fecha_registro" class="form-label">Fecha de Registro</label>
            <input type="date" name="fecha_registro" class="form-control" value="{{ old('fecha_registro', $solicitud->fecha_registro) }}" required>
            @error('fecha_registro') <div class="text-danger">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label for="fecha_cierre" class="form-label">Fecha de Cierre (opcional)</label>
            <input type="date" name="fecha_cierre" class="form-control" value="{{ old('fecha_cierre', $solicitud->fecha_cierre) }}">
            @error('fecha_cierre') <div class="text-danger">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label for="estado" class="form-label">Estado</label>
            <select name="estado" class="form-select" required>
                <option value="Solicitado" {{ old('estado', $solicitud->estado) == 'Solicitado' ? 'selected' : '' }}>Solicitado</option>
                <option value="Aprobado" {{ old('estado', $solicitud->estado) == 'Aprobado' ? 'selected' : '' }}>Aprobado</option>
                <option value="Rechazado" {{ old('estado', $solicitud->estado) == 'Rechazado' ? 'selected' : '' }}>Rechazado</option>
            </select>
            @error('estado') <div class="text-danger">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label for="observaciones" class="form-label">Observaciones (opcional)</label>
            <textarea name="observaciones" class="form-control">{{ old('observaciones', $solicitud->observaciones) }}</textarea>
            @error('observaciones') <div class="text-danger">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">¿Es usuario externo?</label><br>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="usuario_ext" id="usuario_ext_si" value="1" {{ old('usuario_ext', $solicitud->usuario_ext) == 1 ? 'checked' : '' }}>
                <label class="form-check-label" for="usuario_ext_si">Sí</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="usuario_ext" id="usuario_ext_no" value="0" {{ old('usuario_ext', $solicitud->usuario_ext) == 0 ? 'checked' : '' }}>
                <label class="form-check-label" for="usuario_ext_no">No</label>
            </div>
            @error('usuario_ext') <div class="text-danger">{{ $message }}</div> @enderror
        </div>

        <button type="submit" class="btn btn-primary">Actualizar</button>
        <a href="{{ route('solicitudes.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>

</body>
</html>
