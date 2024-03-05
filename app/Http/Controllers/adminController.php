<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use App\Models\Personal;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class adminController extends Controller
{
    public function index()
    {
        $response = Http::get('https://frasedeldia.azurewebsites.net/api/phrase');
        $data = $response->json();
        $personalR = Personal::where('estado', 1)->count();
        $users = User::where('estado', 1)->count();
        $cursos = Curso::where('estado', 1)->count();

        return view('admin.dashboard', compact('data', 'personalR', 'users', 'cursos'));
    }
}
