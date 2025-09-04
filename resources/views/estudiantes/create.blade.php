<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Nuevo Estudiante</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome@6.4.0/css/all.min.css">
    <style>
        body { background-color: #f8f9fa; padding: 20px; }
        .card { box-shadow: 0 0 15px rgba(0,0,0,0.1); }
        .form-label { font-weight: 500; }
        .required-field::after { content: " *"; color: red; }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary mb-4">
        <div class="container">
            <a class="navbar-brand" href="{{ route('estudiantes.index') }}">
                <i class="fas fa-graduation-cap"></i> Sistema de Estudiantes
            </a>
        </div>
    </nav>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
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
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label required-field">Nombres</label>
                                        <input type="text" class="form-control" name="nombres" required 
                                               placeholder="Ingrese los nombres">
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label required-field">Apellidos</label>
                                        <input type="text" class="form-control" name="apellidos" required 
                                               placeholder="Ingrese los apellidos">
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label required-field">Cédula (CI)</label>
                                        <input type="number" class="form-control" name="CI" required 
                                               placeholder="Ingrese el número de cédula">
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label required-field">Edad</label>
                                        <input type="number" class="form-control" name="edad" required 
                                               min="1" max="120" placeholder="Ingrese la edad">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label required-field">Email</label>
                                        <input type="email" class="form-control" name="email" required 
                                               placeholder="ejemplo@correo.com">
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Fecha de Nacimiento</label>
                                        <input type="date" class="form-control" name="fecha_nacimiento">
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label required-field">Estado</label>
                                        <select class="form-select" name="estado" required>
                                            <option value="">Seleccione el estado</option>
                                            <option value="1">Activo</option>
                                            <option value="0">Inactivo</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-4">
                                <a href="{{ route('estudiantes.index') }}" class="btn btn-secondary me-md-2">
                                    <i class="fas fa-times"></i> Cancelar
                                </a>
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-save"></i> Guardar Estudiante
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>