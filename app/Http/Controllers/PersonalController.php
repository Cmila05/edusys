<?php

namespace App\Http\Controllers;

use App\Models\personal;
use Spatie\Permission\Models\Role;
use App\Models\User;
use App\Models\vs_genero;
use App\Models\vs_tipo_documento;
use Illuminate\Http\Request;
use App\Models\Curso;

class PersonalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = Role::pluck('name', 'name')->all();
        $generos = vs_genero::pluck('nombre', 'id');
        $curso = Curso::pluck('nombre', 'id');
        $tiposDocumentos = vs_tipo_documento::pluck('nombre', 'id');
        $personal = new Personal();
        $userRoles = null;
        $personals = personal::all()->where('estado', 1);
        return view('personal.index', compact('personals', 'tiposDocumentos', 'generos', 'personal', 'roles', 'userRoles', 'curso'));
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
        // Validación de datos
        $request->validate(Personal::$rules);

        // Validar existencia de personal por número de documento
        $existingPersonal = Personal::where('numero_documento', $request->input('numero_documento'))->first();

        if ($existingPersonal) {
            // Si ya existe personal con ese número de documento, muestra un mensaje de error y redirige
            return redirect()->back()->with('success', 'Ya existe un personal con este número de documento.');
        }

        // Si no existe, crea el personal
        $data = $request->all();
        $userCorreo = $request['correo'];
        $userDocumento = $request['numero_documento'];
        $userRol = $request['rol'];

        $personal = Personal::create($data);


        $user = new User([
            'email' => $userCorreo,
            'password' => bcrypt($userDocumento),
        ]);

        $adminRole = Role::where('name', $userRol)->first();
        $user->assignRole($adminRole);

        $personal->user()->save($user);


        // Redirige a donde desees
        return redirect()->route('personal.index')
            ->with('success', 'Personal creado con éxito')
            ->with('title', 'Guardado');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $personals = Personal::find($id);
        return view('personal.show', compact('personals'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $curso = Curso::pluck('nombre', 'id');
        $roles = Role::pluck('name', 'id')->all();
        // Obtener el personal por ID
        $personal = Personal::find($id);
        // Verificar si el personal existe
        dd($roles);
        if (!$personal) {
            // Manejar el caso en que no se encuentre el personal
            return abort(404);
        }
        // Obtener el usuario asociado al personal
        $user = $personal->user;
        // Obtener los roles del usuario
        $userRoles = $user->roles->pluck('id')->toArray();
        $generos = vs_genero::pluck('nombre', 'id');
        $tiposDocumentos = vs_tipo_documento::pluck('nombre', 'id');
        return view('personal.edit', compact('personal', 'tiposDocumentos', 'generos', 'roles', 'userRoles','curso'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        $personal = Personal::find($id);
        
        // Validar los datos
        $request->validate(Personal::$rules);

        // Actualizar datos de Personal
        $personal->update($request->all());

        return redirect()->route('personal.index')
            ->with('success', 'Personal actualizado con éxito')
            ->with('title', 'Editado');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $personal = Personal::find($id);

        if ($personal) {
            // Verifica si el estado actual es 1
            if ($personal->estado == 1) {
                // Estado actual es 1, entonces actualiza a 0
                $personal->update(['estado' => 0]);
                return redirect()->route('personal.index')
                    ->with('success', 'Personal eliminado con éxito')
                    ->with('title', 'Eliminado');
            } else {
                // Estado actual es 0, entonces actualiza a 1
                $personal->update(['estado' => 1]);
                return redirect()->route('personal.index')
                    ->with('success', 'Personal activado con éxito')
                    ->with('title', 'Activado');
            }
        } else {
            return redirect()->route('personal.index')
                ->with('error', 'No se encontró el personal');
        }
    }
}
