<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Convenios;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class ConveniosController extends Controller
{
    public function index()
    {
        $convenios = Convenios::all();
        return view('admin.convenios.index', compact('convenios'));
    }

    public function create()
    {
        return view('admin.convenios.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'logo' => 'nullable|image|mimes:jpg,jpeg,png,svg|max:2048',
            'enlace' => 'nullable|url|max:255',
        ]);

        $data = $request->only('nombre', 'logo', 'enlace', 'estado');
        $data['slug'] = Str::slug($request->nombre);

        if ($request->hasFile('logo')) {
            $data['logo'] = $request->file('logo')->store('convenios', 'public');
        }

        Convenios::create($data);
        return redirect()->route('admin.convenios.index')->with('success', 'Convenio creado exitosamente');
    }

    public function edit(Convenios $convenio)
    {
        return view('admin.convenios.edit', compact('convenio'));
    }

    public function update(Request $request, Convenios $convenio)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'logo' => 'nullable|image|mimes:jpg,jpeg,png,svg|max:2048',
            'enlace' => 'nullable|url|max:255',
        ]);

        $data = $request->only('nombre', 'logo', 'enlace');
        $data['slug'] = Str::slug($request->nombre);

        if ($request->hasFile('logo')) {
            if ($convenio->logo) {
                Storage::disk('public')->delete($convenio->logo);
            }
            $data['logo'] = $request->file('logo')->store('convenios', 'public');
        }

        $convenio->update($data);
        return redirect()->route('admin.convenios.index')->with('success', 'Convenio actualizado correctamente');
    }

    public function destroy(Convenios $convenio)
    {
        if ($convenio->logo) {
            Storage::disk('public')->delete($convenio->logo);
        }

        $convenio->delete();
        return redirect()->route('admin.convenios.index')->with('success', 'Convenio eliminado correctamente');
    }

    public function toggleEstado(Convenios $convenio)
    {
        $convenio->estado = !$convenio->estado;
        $convenio->save();

        return redirect()->back();
    }
}
