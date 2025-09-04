<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Estudiante extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'nombres',
        'apellidos',
        'CI',
        'edad',
        'fecha_nacimiento',
        'estado',
        'email',
        'fecha_creacion'
    ];

    protected $casts = [
        'fecha_nacimiento' => 'date',
        'fecha_creacion' => 'datetime',
        'estado' => 'boolean'
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($estudiante) {
            $estudiante->slug = Str::slug($estudiante->nombres . ' ' . $estudiante->apellidos);
        });

        static::updating(function ($estudiante) {
            $estudiante->slug = Str::slug($estudiante->nombres . ' ' . $estudiante->apellidos);
        });
    }

    public function getNombreCompletoAttribute()
    {
        return $this->nombres . ' ' . $this->apellidos;
    }

    // Accesor para estado como texto
    public function getEstadoTextoAttribute()
    {
        return $this->estado ? 'Activo' : 'Inactivo';
    }

    // Accesor para fecha formateada
    public function getFechaCreacionFormateadaAttribute()
    {
        return $this->fecha_creacion->format('d/m/Y H:i');
    }
}