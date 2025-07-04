<?php
namespace App\Http\Controllers;

use App\Models\Areas;
use Illuminate\Http\Request;

class ProgramaController extends Controller
{
    public function porArea($id)
    {
        $area = Areas::findOrFail($id);
        return view('programas.por-area', compact('area'));
    }
}
