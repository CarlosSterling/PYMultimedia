<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Areas;
use Illuminate\Support\Facades\Storage;

class AreasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $areas = Areas::orderBy('nombre')->get();
    
        return view('admin.areas.index', compact('areas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.areas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $data = $request->validate([
        'nombre' => 'required|string|max:255',
        'descripcion' => 'nullable|string',
        'imagen' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
    ]);

    if ($request->hasFile('imagen')) {
        $data['imagen'] = $request->file('imagen')->store('areas', 'public');
    }

    $data['estado'] = true;

    Areas::create($data);

    return redirect()->route('admin.areas.index')->with('success', 'Área creada correctamente.');
}

    /**
     * Display the specified resource.
     */
    public function show(Areas $area)
    {
        return view('admin.areas.show', compact('area'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Areas $area)
    {
        return view('admin.areas.edit', compact('area'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Areas $area)
{
    $data = $request->validate([
        'nombre' => 'required|string|max:255',
        'descripcion' => 'nullable|string',
        'imagen' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
    ]);

    if ($request->hasFile('imagen')) {
        if ($area->imagen && Storage::disk('public')->exists($area->imagen)) {
            Storage::disk('public')->delete($area->imagen);
        }

        $data['imagen'] = $request->file('imagen')->store('areas', 'public');
    }

    $data['estado'] = $request->has('estado');

    $area->update($data);

    return redirect()->route('admin.areas.index')->with('success', 'Área actualizada correctamente.');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Areas $area)
    {
        if ($area->imagen && Storage::disk('public')->exists($area->imagen)) {
            Storage::disk('public')->delete($area->imagen);
        }

        $area->delete();

        return redirect()->route('admin.areas.index')->with('success', 'Área eliminada correctamente.');
    }
}
