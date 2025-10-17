<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Registro;

class DashboardController extends Controller
{
    public function dashboard()
    {
        return view ('panel.dashboard');
    }
    public function create()
    {
        $registros = Registro::all(); // Obtener todos los registros
        return view('reg_prueba', compact('registros'));
        
    }

 

}
