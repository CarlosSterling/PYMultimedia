<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Reglamento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ReglamentoController extends Controller
{
    public function index()
    {
        $reglamentos = Reglamento::orderBy('orden')->get();
        return view('admin.reglamentos.index', compact('reglamentos'));
    }

    public function create()
    {
        return view('admin.reglamentos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'icono' => 'nullable|image|max:2048',
        ]);

        // Alternancia del tipo
        $ultimo = Reglamento::latest('id')->first();
        $tipo = ($ultimo && $ultimo->tipo === 'principio') ? 'derecho' : 'principio';

        // Orden automático
        $orden = Reglamento::max('orden') + 1;

        // Procesar imagen si se subió
        $rutaIcono = null;
        if ($request->hasFile('icono')) {
            $rutaIcono = $request->file('icono')->store('iconos', 'public');
        }

        Reglamento::create([
            'titulo' => $request->titulo,
            'descripcion' => $request->descripcion,
            'icono' => $rutaIcono,
            'tipo' => $tipo,
            'orden' => $orden,
        ]);

        return redirect()->route('admin.reglamentos.index')
                         ->with('success', 'Reglamento creado correctamente.');
    }

    public function edit(Reglamento $reglamento)
    {
        return view('admin.reglamentos.edit', compact('reglamento'));
    }

    public function update(Request $request, Reglamento $reglamento)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'icono' => 'nullable|image|max:2048',
        ]);

        $data = $request->only(['titulo', 'descripcion']);

        if ($request->hasFile('icono')) {
            $data['icono'] = $request->file('icono')->store('iconos', 'public');
        }

        $reglamento->update($data);

        return redirect()->route('admin.reglamentos.index')
                         ->with('success', 'Reglamento actualizado correctamente.');
    }

    public function destroy(Reglamento $reglamento)
    {
        if ($reglamento->icono) {
            Storage::disk('public')->delete($reglamento->icono);
        }

        $reglamento->delete();

        return redirect()->route('admin.reglamentos.index')
                         ->with('success', 'Reglamento eliminado correctamente.');
    }
}
