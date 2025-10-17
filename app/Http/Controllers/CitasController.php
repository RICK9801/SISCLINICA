<?php

namespace App\Http\Controllers;

use App\Models\Citas;
use App\Models\Pacientes;
use App\Models\Odontologos;
use App\Models\Servicio;
use Illuminate\Http\Request;

class CitasController extends Controller
{
    // Mostrar lista de citas
    public function index()
    {
        $data['getRecord'] = Citas::with(['paciente', 'odontologo', 'servicio'])
            ->orderBy('fecha')
            ->orderBy('hora')
            ->get();

        return view('panel.citas.list', $data);
    }

    // Mostrar formulario para nueva cita
    public function create()
    {
        $data['pacientes'] = Pacientes::all();
        $data['odontologos'] = Odontologos::all();
        $data['servicios'] = Servicio::all();

        return view('panel.citas.add', $data);
    }

    // Guardar nueva cita
    public function store(Request $request)
    {
        $request->validate([
            'paciente_id' => 'required|exists:pacientes,id',
            'odontologo_id' => 'required|exists:odontologos,id',
            'servicio_id' => 'nullable|exists:servicios,id',
            'fecha' => 'required|date',
            'hora' => 'required',
            'estado' => 'nullable|in:Programada,Cancelada,Atendida',
            'observaciones' => 'nullable|string',
        ]);

        $cita = new Citas();
        $cita->paciente_id = $request->paciente_id;
        $cita->odontologo_id = $request->odontologo_id;
        $cita->servicio_id = $request->servicio_id;
        $cita->fecha = $request->fecha;
        $cita->hora = $request->hora;
        $cita->estado = $request->estado ?? 'Programada';
        $cita->observaciones = $request->observaciones;
        $cita->save();

        return redirect('panel/citas')->with('success', 'Cita registrada exitosamente.');
    }

    // Mostrar formulario de edición
    public function edit($id)
    {
        $data['getRecord'] = Citas::findOrFail($id);
        $data['pacientes'] = Pacientes::all();
        $data['odontologos'] = Odontologos::all();
        $data['servicios'] = Servicio::all();

        return view('panel.citas.edit', $data);
    }

    // Actualizar cita
    public function update($id, Request $request)
    {
        $request->validate([
            'paciente_id' => 'required|exists:pacientes,id',
            'odontologo_id' => 'required|exists:odontologos,id',
            'servicio_id' => 'nullable|exists:servicios,id',
            'fecha' => 'required|date',
            'hora' => 'required',
            'estado' => 'nullable|in:Programada,Cancelada,Atendida',
            'observaciones' => 'nullable|string',
        ]);

        $cita = Citas::findOrFail($id);
        $cita->paciente_id = $request->paciente_id;
        $cita->odontologo_id = $request->odontologo_id;
        $cita->servicio_id = $request->servicio_id;
        $cita->fecha = $request->fecha;
        $cita->hora = $request->hora;
        $cita->estado = $request->estado ?? 'Programada';
        $cita->observaciones = $request->observaciones;
        $cita->save();

        return redirect('panel/citas')->with('success', 'Cita actualizada correctamente.');
    }

    // Eliminar cita
    public function destroy($id)
    {
        $cita = Citas::findOrFail($id);
        $cita->delete();

        return redirect('panel/citas')->with('success', 'Cita eliminada exitosamente.');
    }
}
