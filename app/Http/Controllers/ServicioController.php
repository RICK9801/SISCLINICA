<?php

namespace App\Http\Controllers;

use App\Models\Servicio;
use App\Models\Pacientes;
use App\Models\Tratamientos;
use App\Models\Odontologos;
use Illuminate\Http\Request;


use App\Models\PermissionRoleModel;
use App\Models\RoleModel;
use App\Models\SucursalModel;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ServicioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $data[ 'getRecord' ] = Servicio::with(['pacientes','tratamientos','odontologos'])->get();
// dd($data['getRecord']);
        return view( 'panel.servicios.list', $data );
    }

    /**
     * Show the form for creating a new resource.
     */
    
    public function create()
    {
        $data[ 'pacientes' ]= Pacientes::all(); // Asegúrate de importar el modelo Paciente
        $data[ 'odontologos' ] = Odontologos::all();
        $data[ 'tratamientos' ] = Tratamientos::all();

        // $getPermission = PermissionModel::getRecord();

        $data[ 'getRole' ] = RoleModel::getRecord();
        return view ( 'panel.servicios.add', $data );
    }

    /**
     * Store a newly created resource in storage.
     */
       public function store( Request $request ) {
        
        if ( $request->tipo == 'calculo' ) {

            $data = Servicio::with( 'tratamientos' )->where( 'id', $request->id )->first();

            if ( !$data ) {
                return back()->with( 'error', 'Servicio no encontrado.' );
            }

            $costoTratamiento = $data->tratamientos->costo;
            $montoActual = $data->monto_pagado;
            $nuevoMonto = $request->monto_pagado;
            $montoFinal = $montoActual + $nuevoMonto;

            // Validación: no permitir que el monto supere el costo
            if ( $montoFinal > $costoTratamiento ) {
                return back()->with( 'error', 'El monto ingresado supera el costo total del tratamiento.' );
            }

            $resto = $costoTratamiento - $montoFinal;

            // Actualizar servicio
            $servicio = Servicio::getSingle( $data->id );
            $servicio->monto_pagado = $montoFinal;
            $servicio->monto_restante = $resto;

            if ( $montoFinal >= $costoTratamiento ) {
                $servicio->estado_pago = 'pagado';
            }

            $servicio->save();

            // // Registrar historial
            // $historial = new Historial();
            // $historial->servicio_id = $data->id;
            // $historial->monto_total = $costoTratamiento;
            // $historial->monto_pagado = $montoFinal;
            // $historial->monto_restante = $resto;
            // $historial->save();

            return back()->with( 'success', 'Pago registrado correctamente.' );
        }

        // Registro de un nuevo servicio
        $servicio = new Servicio();
        $servicio->paciente_id = $request->paciente_id;
        $servicio->odontologo_id = $request->odontologo_id;
        $servicio->tratamiento_id = $request->tratamiento_id;
        $servicio->fecha_servicio = $request->fecha_servicio;
        $servicio->metodo_pago = $request->metodo_pago;
        $servicio->estado_pago = $request->estado_pago ?? 'pendiente';
        $servicio->monto_pagado = 0;
        $servicio->monto_restante = 0;
        $servicio->save();

        // // Historial vacío al inicio
        // $historial = new Historial();
        // $historial->servicio_id = $servicio->id;
        // $historial->monto_total = 0;
        // $historial->monto_pagado = 0;
        // $historial->monto_restante = 0;
        // $historial->save();

        return redirect( 'panel/servicios' )->with( 'success', 'Servicio creado con éxito.' );
    }

    /**
     * Display the specified resource.
     */
    public function show(Servicio $servicio)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $data['getRecord'] = Servicio::findOrFail($id); 
        $data[ 'pacientes' ]= Pacientes::all(); // Asegúrate de importar el modelo Paciente
        $data[ 'odontologos' ] = Odontologos::all();
        $data[ 'tratamientos' ] = Tratamientos::all();

        $data[ 'getRolePermission' ] = PermissionRoleModel::getRolePermission( $id );
        return view ( 'panel.servicios.edit', $data );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update($id, Request $request )
    {
       $servicio = Servicio::findOrFail($id);

    $servicio->paciente_id = $request->paciente_id;
    $servicio->odontologo_id = $request->odontologo_id;
    $servicio->tratamiento_id = $request->tratamiento_id;
    $servicio->fecha_servicio = $request->fecha_servicio;
    $servicio->metodo_pago = $request->metodo_pago;
    $servicio->estado_pago = $request->estado_pago;

    // Asegúrate que estas columnas EXISTEN en tu tabla
    $servicio->monto_pagado = $request->monto_pagado ?? 0;
    $servicio->monto_restante = $request->monto_restante ?? 0;

    $servicio->save();
    


        return redirect( 'panel/servicios' )->with( 'success', 'servicios actualizado correctamente' );

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
      
        $user = Servicio::getSingle( $id );
        $user->delete();

        return redirect( 'panel/servicios' )->with( 'success', 'Paciente borrado éxitosamente' );
    }
}
