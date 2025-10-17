<?php

namespace App\Http\Controllers;

use App\Models\Odontologos;
use Illuminate\Http\Request;

class OdontologosController extends Controller
{
    public function index()
    {
        
        $data['getRecord'] = Odontologos::getRecord();
        return view('panel.odontologos.list', $data);
    }

    public function create()
    {
        return view('panel.odontologos.add');
    }

    public function store(Request $request)
    {
        $request->validate([
            'ci' => 'nullable|unique:odontologos',
            'email' => 'nullable|email',
        ]);

        $odontologo = new Odontologos();
        $odontologo->nombre = $request->nombre;
        $odontologo->apellido = $request->apellido;
        $odontologo->ci = $request->ci;
        $odontologo->especialidad = $request->especialidad;
        $odontologo->telefono = $request->telefono;
        $odontologo->email = $request->email;
        $odontologo->save();

        return redirect('panel/odontologos')->with('success', 'Odontólogo registrado con éxito');
    }

    public function edit($id)
    {
        $data['getRecord'] = Odontologos::getSingle($id);
        return view('panel.odontologos.edit', $data);
    }

    public function update($id, Request $request)
    {
        $request->validate([
            'ci' => 'nullable|unique:odontologos,ci,' . $id,
            'email' => 'nullable|email',
        ]);

        $odontologo = Odontologos::getSingle($id);
        $odontologo->nombre = $request->nombre;
        $odontologo->apellido = $request->apellido;
        $odontologo->ci = $request->ci;
        $odontologo->especialidad = $request->especialidad;
        $odontologo->telefono = $request->telefono;
        $odontologo->email = $request->email;
        $odontologo->save();

        return redirect('panel/odontologos')->with('success', 'Odontólogo actualizado con éxito');
    }

    public function destroy($id)
    {
        Odontologos::getSingle($id)->delete();
        return redirect('panel/odontologos')->with('success', 'Odontólogo eliminado');
    }
}
