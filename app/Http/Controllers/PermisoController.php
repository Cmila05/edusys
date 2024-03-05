<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermisoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $permisos =Permission::all()->where('estado','1');

        return view('permisson.index', compact('permisos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $permisos = Permission::create(['name' =>$request->input('nombre')]);

        return redirect()->route('permisos.index')
            ->with('success', 'permiso Creado con exito');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $permisos = Permission::find($id);

        return view('permisson.show', compact('permisos'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $permisos = Permission::find($id);

        if ($permisos) {
            // Actualiza el estado a 0 en lugar de eliminar físicamente
            $permisos->delete();

            // También puedes realizar acciones adicionales si es necesario

            return redirect()->route('permisos.index')
                ->with('success', 'permiso eliminado con éxito')
                ->with('title', 'Eliminado');
        } 
    }
}
