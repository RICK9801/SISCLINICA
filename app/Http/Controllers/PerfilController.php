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

class PerfilController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       
        return view('panel.perfil.list');
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
    public function store(Request $request)
    {
// dd($request);
        $servicio = new Servicio();
        $servicio->paciente_id = $request->paciente_id;
        $servicio->odontologo_id = $request->odontologo_id;
        $servicio->tratamiento_id = $request->tratamiento_id;
        $servicio->fecha_servicio = $request->fecha_servicio;
        $servicio->monto_total = $request->monto_total;
        $servicio->monto_pagado = $request->monto_pagado;
        $servicio->saldo_restante = $request->saldo_restante;
        $servicio->metodo_pago = $request->metodo_pago;
        $servicio->estado_pago = $request->estado_pago;

        // Aquí haces la resta
    $servicio->saldo_restante = $request->monto_total - $request->monto_pagado;

    $servicio->metodo_pago = $request->metodo_pago;
    $servicio->estado_pago = $request->estado_pago;
    $servicio->save();

        // PermissionRoleModel::InserUpdateRecord($request->permission_id, $save->id);
        return redirect('panel/servicios')->with('success', "Role creado con éxito");
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
        $servicio = Servicio::getSingle( $id );
      
        $servicio->paciente_id = $request->paciente_id;
        $servicio->odontologo_id = $request->odontologo_id;
        $servicio->tratamiento_id = $request->tratamiento_id;
        $servicio->fecha_servicio = $request->fecha_servicio;
        $servicio->monto_total = $request->monto_total;
        $servicio->monto_pagado = $request->monto_pagado;
        $servicio->saldo_restante = $request->saldo_restante;
        $servicio->metodo_pago = $request->metodo_pago;
        $servicio->estado_pago = $request->estado_pago;

        $servicio->metodo_pago = $request->metodo_pago;
        $servicio->estado_pago = $request->estado_pago;
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
