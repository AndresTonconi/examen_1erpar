<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Nuevo Estudiante</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome@6.4.0/css/all.min.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary mb-4">
        <div class="container">
            <a class="navbar-brand" href="{{ route('estudiantes.index') }}">
                <i class="fas fa-graduation-cap"></i> Sistema Estudiantes
            </a>
        </div>
    </nav>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <h3 class="mb-0">
                                <i class="fas fa-user-plus"></i> Crear Nuevo Estudiante
                            </h3>
                            <a href="{{ route('estudiantes.index') }}" class="btn btn-outline-secondary">
                                <i class="fas fa-arrow-left"></i> Volver
                            </a>
                        </div>
                    </div>

                    <div class="card-body">
                        <form action="{{ route('estudiantes.store') }}" method="POST">
                            @csrf

                            <div class="row">
                                <!-- Columna izquierda -->
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label required-field">Nombres</label>
                                        <input type="text" class="form-control @error('nombres') is-invalid @enderror" 
                                               name="nombres" value="{{ old('nombres') }}" required 
                                               placeholder="Ingrese los nombres">
                                        @error('nombres')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label required-field">Apellidos</label>
                                        <input type="text" class="form-control @error('apellidos') is-invalid @enderror" 
                                               name="apellidos" value="{{ old('apellidos') }}" required 
                                               placeholder="Ingrese los apellidos">
                                        @error('apellidos')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label required-field">Cédula (CI)</label>
                                        <input type="number" class="form-control @error('CI') is-invalid @enderror" 
                                               name="CI" value="{{ old('CI') }}" required 
                                               placeholder="Ingrese el número de cédula">
                                        @error('CI')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label required-field">Edad</label>
                                        <input type="number" class="form-control @error('edad') is-invalid @enderror" 
                                               name="edad" value="{{ old('edad') }}" required min="1" max="120"
                                               placeholder="Ingrese la edad">
                                        @error('edad')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Columna derecha -->
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label required-field">Email</label>
                                        <input type="email" class="form-control @error('email') is-invalid @enderror" 
                                               name="email" value="{{ old('email') }}" required 
                                               placeholder="ejemplo@correo.com">
                                        @error('email')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Fecha de Nacimiento</label>
                                        <input type="date" class="form-control @error('fecha_nacimiento') is-invalid @enderror" 
                                               name="fecha_nacimiento" value="{{ old('fecha_nacimiento') }}">
                                        @error('fecha_nacimiento')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label required-field">Estado</label>
                                        <select class="form-select @error('estado') is-invalid @enderror" name="estado" required>
                                            <option value="">Seleccione el estado</option>
                                            <option value="1" {{ old('estado') == '1' ? 'selected' : '' }}>Activo</option>
                                            <option value="0" {{ old('estado') == '0' ? 'selected' : '' }}>Inactivo</option>
                                        </select>
                                        @error('estado')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <!-- Botones -->
                            <div class="row mt-4">
                                <div class="col-12">
                                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                        <a href="{{ route('estudiantes.index') }}" class="btn btn-secondary me-md-2">
                                            <i class="fas fa-times"></i> Cancelar
                                        </a>
                                        <button type="submit" class="btn btn-primary">
                                            <i class="fas fa-save"></i> Guardar Estudiante
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>