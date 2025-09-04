<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Estudiantes</title>
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
        <!-- Alertas -->
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show">
                <i class="fas fa-check-circle"></i> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between align-items-center">
                    <h3 class="mb-0">
                        <i class="fas fa-users"></i> Lista de Estudiantes
                    </h3>
                    <a href="{{ route('estudiantes.create') }}" class="btn btn-primary">
                        <i class="fas fa-plus"></i> Nuevo Estudiante
                    </a>
                </div>
            </div>

            <div class="card-body">
                @if($estudiantes->count() > 0)
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead class="table-dark">
                                <tr>
                                    <th>ID</th>
                                    <th>Nombres</th>
                                    <th>Apellidos</th>
                                    <th>CI</th>
                                    <th>Edad</th>
                                    <th>Email</th>
                                    <th>Estado</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($estudiantes as $estudiante)
                                <tr>
                                    <td>{{ $estudiante->id }}</td>
                                    <td>{{ $estudiante->nombres }}</td>
                                    <td>{{ $estudiante->apellidos }}</td>
                                    <td>{{ $estudiante->CI }}</td>
                                    <td>{{ $estudiante->edad }} años</td>
                                    <td>{{ $estudiante->email }}</td>
                                    <td>
                                        <span class="badge {{ $estudiante->estado ? 'bg-success' : 'bg-danger' }}">
                                            {{ $estudiante->estado ? 'Activo' : 'Inactivo' }}
                                        </span>
                                    </td>
                                    <td>
                                        <div class="btn-group">
                                            <a href="#" class="btn btn-info btn-sm btn-action" title="Ver">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <a href="#" class="btn btn-warning btn-sm btn-action" title="Editar">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form action="#" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm" 
                                                        onclick="return confirm('¿Eliminar estudiante?')" title="Eliminar">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <!-- Paginación -->
                    <div class="d-flex justify-content-center mt-4">
                        {{ $estudiantes->links() }}
                    </div>
                @else
                    <div class="text-center py-5">
                        <i class="fas fa-user-graduate fa-3x text-muted mb-3"></i>
                        <h4 class="text-muted">No hay estudiantes registrados</h4>
                        <p class="text-muted">Comienza agregando el primer estudiante</p>
                        <a href="{{ route('estudiantes.create') }}" class="btn btn-primary mt-2">
                            <i class="fas fa-plus"></i> Crear Primer Estudiante
                        </a>
                    </div>
                @endif
            </div>

            <div class="card-footer text-muted">
                Total de estudiantes: <strong>{{ $estudiantes->total() }}</strong>
            </div>
        </div>
    </div>
</body>
</html>