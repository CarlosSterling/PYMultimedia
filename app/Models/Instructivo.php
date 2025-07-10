<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Instructivo extends Model
{
    use HasFactory;

    protected $fillable = [
        'titulo',
        'enlace',
        'icono',
        'estado',
        'orden',
    ];

    protected $casts = [
        'estado' => 'boolean',
    ];
}
