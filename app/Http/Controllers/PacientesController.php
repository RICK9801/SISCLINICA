<?php

namespace App\Http\Controllers;

use App\Models\Pacientes;
use Illuminate\Http\Request;

use App\Models\PermissionRoleModel;
use App\Models\RoleModel;
use App\Models\SucursalModel;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

use App\Models\PermissionModel;
use Hash;


class PacientesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $permissionCategory = PermissionRoleModel::getPermission( 'User', Auth::user()->role_id );
        if ( empty( $permissionCategory ) ) {
            abort( 404 );
        }

        $data[ 'PermissionAdd' ] = PermissionRoleModel::getPermission( 'Add Category', Auth::user()->role_id );
        $data[ 'PermissionEdit' ] = PermissionRoleModel::getPermission( 'Edit Category', Auth::user()->role_id );
        $data[ 'PermissionDelete' ] = PermissionRoleModel::getPermission( 'Delete Category', Auth::user()->role_id );

        $data[ 'getRecord' ] = Pacientes::getRecord();

        return view( 'panel.pacientes.list', $data );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $permissionCategory = PermissionRoleModel::getPermission( 'Add Category', Auth::user()->role_id );
        if ( empty( $permissionCategory ) ) {
            abort( 404 );
        }

        $getPermission = PermissionModel::getRecord();

        $data[ 'getRole' ] = RoleModel::getRecord();
        return view ( 'panel.pacientes.add', $data );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $permissionCategory = PermissionRoleModel::getPermission( 'Add Category', Auth::user()->role_id );
        if ( empty( $permissionCategory ) )
 {
            abort( 404 );
        }
        request()->validate( [
            'email' => 'required|email|unique:users',
        ] );
        $user = new Pacientes();
        $user->nombre = trim( $request->nombre );
        $user->apellido = trim( $request->apellido );
        $user->ci = trim( $request->ci );
        $user->telefono = trim( $request->telefono );        
        $user->email = trim( $request->email );
        $user->fecha_nacimiento = trim( $request->fecha_nacimiento );
        $user->genero = trim( $request->genero );
        $user->direccion = trim( $request->direccion );
        $user->save();

        PermissionRoleModel::InserUpdateRecord($request->permission_id, $save->id);
        return redirect('panel/pacientes')->with('success', "Role creado con éxito");
    }

    /**
     * Display the specified resource.
     */
    public function show(Pacientes $pacientes)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $permissionCategory = PermissionRoleModel::getPermission( 'Edit Category', Auth::user()->role_id );
        if ( empty( $permissionCategory ) ) {
            abort( 404 );
        }

        $data[ 'getRecord' ] = Pacientes::getSingle( $id );

        $data[ 'getRole' ] = RoleModel::getRecord();

        $data[ 'getRolePermission' ] = PermissionRoleModel::getRolePermission( $id );
        return view ( 'panel.pacientes.edit', $data );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update($id, Request $request )
    {
        $permissionCategory = PermissionRoleModel::getPermission( 'Edit Category', Auth::user()->role_id );
        if ( empty( $permissionCategory ) ) {
            abort( 404 );
        }
        $request->validate([
            'ci' => 'required|unique:pacientes,ci,' . $id,
            // otras validaciones...
        ]);
        
        $pacientes = Pacientes::getSingle( $id );

        $pacientes->nombre = trim( $request->nombre );
        $pacientes->apellido = trim( $request->apellido );
        $pacientes->ci = trim( $request->ci );
        $pacientes->telefono = trim( $request->telefono );
        $pacientes->email = trim( $request->email );
        $pacientes->fecha_nacimiento = trim( $request->fecha_nacimiento );
        $pacientes->genero = trim( $request->genero );
        $pacientes->direccion = trim( $request->direccion );
        $pacientes->save();

        return redirect( 'panel/pacientes' )->with( 'success', 'Paciente actualizado correctamente' );

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $permissionCategory = PermissionRoleModel::getPermission( 'Delete Category', Auth::user()->role_id );
        if ( empty( $permissionCategory ) ) {
            abort( 404 );
        }

        $user = Pacientes::getSingle( $id );
        $user->delete();

        return redirect( 'panel/pacientes' )->with( 'success', 'Paciente borrado éxitosamente' );
    }
}
