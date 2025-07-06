<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Areas extends Model
{

    use HasFactory;
    
    protected $table = 'areas';

    protected $fillable = [
        'nombre',
        'descripcion',
        'imagen',
        'estado',
    ];

    public function programas()
{
    return $this->hasMany(Programas::class, 'area_id');
}
}

