<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Registro;

class RecuperacionController extends Controller
{
    // Método para cargar la vista del dashboard de recuperación
    public function recuperacion()
    {
        // dd('hola');
        return view('auth.password.recuperacion');
    }
}