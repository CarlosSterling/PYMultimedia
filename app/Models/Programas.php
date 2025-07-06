<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Programas extends Model
{

    protected $table = 'programas';

    protected $fillable = [
        'nombre_programa',
        'descripcion_programa',
        'imagen',
        'requiere_titulo_bachiller',
        'requiere_icfes',
        'requiere_certificado_medico',
        'requiere_prueba_ingreso',
        'instructor_lider',
        'implementos_requeridos',
        'cantidad_instructores',
        'detalle_instructores',
        'area_id',
    ];

     // Relación con el modelo Área
     public function area()
     {
        return $this->belongsTo(Areas::class, 'area_id');
    }
}
