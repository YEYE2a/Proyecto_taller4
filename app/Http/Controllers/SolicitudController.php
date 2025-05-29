<?php

namespace App\Http\Controllers;

use App\Models\Solicitud;
use Illuminate\Http\Request;

class SolicitudController extends Controller
{
    public function index()
    {
        $solicitudes = Solicitud::all();
        return view('solicitudes.index', compact('solicitudes'));
    }

    public function create()
    {
        return view('solicitudes.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'tema' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'area' => 'required|in:TI,Contabilidad,Administrativo,Operativo',
            'fecha_registro' => 'required|date',
            'fecha_cierre' => 'nullable|date|after_or_equal:fecha_registro',
            'estado' => 'required|in:Solicitado,Aprobado,Rechazado',
            'observaciones' => 'nullable|string',
            'usuario_ext' => 'required|boolean',
        ]);

        Solicitud::create($validated);

        return redirect()->route('solicitudes.index')->with('success', 'Solicitud creada correctamente');
    }

    public function show($id)
    {
        $solicitud = Solicitud::findOrFail($id);
        return view('solicitudes.show', compact('solicitud'));
    }

    public function edit($id)
    {
        $solicitud = Solicitud::findOrFail($id);
        return view('solicitudes.edit', compact('solicitud'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'tema' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'area' => 'required|in:TI,Contabilidad,Administrativo,Operativo',
            'fecha_registro' => 'required|date',
            'fecha_cierre' => 'nullable|date|after_or_equal:fecha_registro',
            'estado' => 'required|in:Solicitado,Aprobado,Rechazado',
            'observaciones' => 'nullable|string',
            'usuario_ext' => 'required|boolean',
        ]);

        $solicitud = Solicitud::findOrFail($id);
        $solicitud->update($validated);

        return redirect()->route('solicitudes.index')->with('success', 'Solicitud actualizada correctamente.');
    }

    public function destroy($id)
    {
        $solicitud = Solicitud::findOrFail($id);
        $solicitud->delete();

        return redirect()->route('solicitudes.index')->with('success', 'Solicitud eliminada correctamente.');
    }
}
