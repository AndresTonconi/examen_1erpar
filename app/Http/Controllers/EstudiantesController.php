<?php

namespace App\Http\Controllers;

use App\Models\Estudiante;
use App\Http\Requests\RequestEstudiantes;
use Illuminate\Http\Request;

class EstudianteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Obtener todos los estudiantes activos (no eliminados) ordenados por ID descendente
        $estudiantes = Estudiante::whereNull('deleted_at')
                        ->orderBy('id', 'desc')
                        ->paginate(10); // Paginación de 10 registros por página
        
        // Retornar la vista con los estudiantes
        return view('estudiantes.index', compact('estudiantes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Mostrar el formulario de creación
        return view('estudiantes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RequestEstudiantes $request)
    {
        // La validación se hace automáticamente por RequestEstudiantes
        // Crear el nuevo estudiante
        Estudiante::create([
            'nombres' => $request->nombres,
            'apellidos' => $request->apellidos,
            'CI' => $request->CI,
            'edad' => $request->edad,
            'fecha_nacimiento' => $request->fecha_nacimiento,
            'estado' => $request->estado,
            'email' => $request->email,
            'fecha_creacion' => now(),
        ]);

        // Redireccionar con mensaje de éxito
        return redirect()->route('estudiantes.index')
            ->with('success', 'Estudiante creado exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $estudiante = Estudiante::findOrFail($id);
        return view('estudiantes.show', compact('estudiante'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $estudiante = Estudiante::findOrFail($id);
        return view('estudiantes.edit', compact('estudiante'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(RequestEstudiantes $request, $id)
    {
        $estudiante = Estudiante::findOrFail($id);
        
        $estudiante->update([
            'nombres' => $request->nombres,
            'apellidos' => $request->apellidos,
            'CI' => $request->CI,
            'edad' => $request->edad,
            'fecha_nacimiento' => $request->fecha_nacimiento,
            'estado' => $request->estado,
            'email' => $request->email,
        ]);

        return redirect()->route('estudiantes.index')
            ->with('success', 'Estudiante actualizado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $estudiante = Estudiante::findOrFail($id);
        $estudiante->delete();

        return redirect()->route('estudiantes.index')
            ->with('success', 'Estudiante eliminado exitosamente.');
    }
}