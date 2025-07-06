<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Programas;
use App\Models\Areas;

class ProgramasController extends Controller
{
    public function index()
    {
        $programas = Programas::with('area')->get();
        return view('admin.programas.index', compact('programas'));
    }

    public function create()
    {
        $areas = Areas::where('estado', true)->get();
        return view('admin.programas.create', compact('areas'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nombre_programa' => 'required|string|max:255',
            'descripcion_programa' => 'nullable|string',
            'imagen' => 'nullable|image|max:2048',
            'instructor_lider' => 'nullable|string|max:255',
            'implementos_requeridos' => 'nullable|string|max:255',
            'cantidad_instructores' => 'nullable|integer',
            'detalle_instructores' => 'nullable|string',
            'area_id' => 'required|exists:areas,id',
        ]);

        if ($request->hasFile('imagen')) {
            $path = $request->file('imagen')->store('programas', 'public');
            $data['imagen'] = 'storage/' . $path;
        }

        foreach ([
            'requiere_titulo_bachiller',
            'requiere_icfes',
            'requiere_certificado_medico',
            'requiere_prueba_ingreso'
        ] as $field) {
            $data[$field] = $request->boolean($field);
        }

        Programas::create($data);

        return redirect()->route('admin.programas.index')->with('success', 'Programa creado exitosamente.');
    }

    public function show(Programas $programa)
    {
        return view('admin.programas.show', compact('programa'));
    }

    public function edit(Programas $programa)
    {
        $areas = Areas::where('estado', true)->get();
        return view('admin.programas.edit', compact('programa', 'areas'));
    }

    public function update(Request $request, Programas $programa)
    {
        $data = $request->validate([
            'nombre_programa' => 'required|string|max:255',
            'descripcion_programa' => 'nullable|string',
            'imagen' => 'nullable|image|max:2048',
            'instructor_lider' => 'nullable|string|max:255',
            'implementos_requeridos' => 'nullable|string|max:255',
            'cantidad_instructores' => 'nullable|integer',
            'detalle_instructores' => 'nullable|string',
            'area_id' => 'required|exists:areas,id',
        ]);

        if ($request->hasFile('imagen')) {
            $path = $request->file('imagen')->store('programas', 'public');
            $data['imagen'] = 'storage/' . $path;
        }

        foreach ([
            'requiere_titulo_bachiller',
            'requiere_icfes',
            'requiere_certificado_medico',
            'requiere_prueba_ingreso'
        ] as $field) {
            $data[$field] = $request->boolean($field);
        }

        $programa->update($data);

        return redirect()->route('admin.programas.index')->with('success', 'Programa actualizado correctamente.');
    }

    public function destroy(Programas $programa)
    {
        $programa->delete();
        return redirect()->route('admin.programas.index')->with('success', 'Programa eliminado.');
    }

    public function porArea(\App\Models\Areas $area)
{
    $programas = $area->programas()->get();
    return view('admin.programas.index', compact('programas', 'area'));
}

}
