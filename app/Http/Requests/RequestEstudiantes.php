<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class RequestEstudiantes extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        // Cambia a true para permitir la validación
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        // Para update, necesitamos excluir el registro actual
        $estudianteId = $this->route('estudiante') ? $this->route('estudiante') : null;

        return [
            'nombres' => 'required|string|max:100',
            'apellidos' => 'required|string|max:100',
            'CI' => [
                'required',
                'integer',
                Rule::unique('estudiantes')->ignore($estudianteId)
            ],
            'edad' => 'required|integer|min:1|max:120',
            'fecha_nacimiento' => 'nullable|date|before:today',
            'estado' => 'required|boolean',
            'email' => [
                'required',
                'email',
                'max:255',
                Rule::unique('estudiantes')->ignore($estudianteId)
            ],
        ];
    }

    /**
     * Get custom messages for validator errors.
     */
    public function messages(): array
    {
        return [
            'nombres.required' => 'El campo nombres es obligatorio.',
            'nombres.max' => 'Los nombres no deben exceder los 100 caracteres.',
            
            'apellidos.required' => 'El campo apellidos es obligatorio.',
            'apellidos.max' => 'Los apellidos no deben exceder los 100 caracteres.',
            
            'CI.required' => 'El campo CI es obligatorio.',
            'CI.integer' => 'La CI debe ser un número entero.',
            'CI.unique' => 'Esta CI ya está registrada.',
            
            'edad.required' => 'El campo edad es obligatorio.',
            'edad.integer' => 'La edad debe ser un número entero.',
            'edad.min' => 'La edad mínima es 1 año.',
            'edad.max' => 'La edad máxima es 120 años.',
            
            'fecha_nacimiento.date' => 'La fecha de nacimiento debe ser una fecha válida.',
            'fecha_nacimiento.before' => 'La fecha de nacimiento debe ser anterior a hoy.',
            
            'estado.required' => 'El campo estado es obligatorio.',
            'estado.boolean' => 'El estado debe ser activo o inactivo.',
            
            'email.required' => 'El campo email es obligatorio.',
            'email.email' => 'El email debe tener un formato válido.',
            'email.max' => 'El email no debe exceder los 255 caracteres.',
            'email.unique' => 'Este email ya está registrado.',
        ];
    }

    /**
     * Get custom attributes for validator errors.
     */
    public function attributes(): array
    {
        return [
            'nombres' => 'nombres',
            'apellidos' => 'apellidos',
            'CI' => 'CI',
            'edad' => 'edad',
            'fecha_nacimiento' => 'fecha de nacimiento',
            'estado' => 'estado',
            'email' => 'email',
        ];
    }
}