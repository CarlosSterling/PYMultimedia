<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Instructivo;
use Illuminate\Http\Request;

class InstructivoController extends Controller
{
    public function index()
{
    $instructivos = Instructivo::paginate(5);
    return view('admin.instructivos.index', compact('instructivos'));
}

    public function create()
    {
        return view('admin.instructivos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'enlace' => 'nullable|url',
            'icono' => 'nullable|string',
            'estado' => 'boolean',
            'orden' => 'nullable|integer',
        ]);

        Instructivo::create($request->all());

        return redirect()->route('admin.instructivos.index')
                         ->with('success', 'Instructivo creado correctamente.');
    }

    public function edit(Instructivo $instructivo)
    {
        return view('admin.instructivos.edit', compact('instructivo'));
    }

    public function update(Request $request, Instructivo $instructivo)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'enlace' => 'nullable|url',
            'icono' => 'nullable|string',
            'estado' => 'boolean',
            'orden' => 'nullable|integer',
        ]);

        $instructivo->update($request->all());

        return redirect()->route('admin.instructivos.index')
                         ->with('success', 'Instructivo actualizado correctamente.');
    }

    public function destroy(Instructivo $instructivo)
    {
        $instructivo->delete();

        return redirect()->route('admin.instructivos.index')
                         ->with('success', 'Instructivo eliminado.');
    }
}
