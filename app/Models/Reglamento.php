<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Reglamento extends Model
{
    use HasFactory;

    protected $table = 'reglamentos';

    protected $fillable = [
        'tipo',
        'titulo',
        'descripcion',
        'icono',
        'orden',
    ];

    /**
     * Scope para filtrar por tipo (principio o derecho).
     */
    public function scopeTipo($query, string $tipo)
    {
        return $query->where('tipo', $tipo);
    }

    /**
     * Accesor para retornar el tipo en mayúsculas.
     */
    public function getTipoUpperAttribute(): string
    {
        return strtoupper($this->tipo);
    }
}
