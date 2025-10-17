<?php

namespace App\Http\Controllers;

use App\Models\PermissionRoleModel;
use Illuminate\Http\Request;
use App\Models\RoleModel;
use App\Models\SucursalModel;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

use App\Models\PermissionModel;
use Hash;

class UserController extends Controller
 {
    public function list()
 {
        $PermissionUser = PermissionRoleModel::getPermission( 'User', Auth::user()->role_id );
        if ( empty( $PermissionUser ) ) {
            abort( 404 );
        }

        $data[ 'PermissionAdd' ] = PermissionRoleModel::getPermission( 'Add User', Auth::user()->role_id );
        $data[ 'PermissionEdit' ] = PermissionRoleModel::getPermission( 'Edit User', Auth::user()->role_id );
        $data[ 'PermissionDelete' ] = PermissionRoleModel::getPermission( 'Delete User', Auth::user()->role_id );

        $data[ 'getRecord' ] = User::getRecord();

        return view( 'panel.user.list', $data );
    }

    public function add()
 {
        $PermissionUser = PermissionRoleModel::getPermission( 'Add User', Auth::user()->role_id );
        if ( empty( $PermissionUser ) ) {
            abort( 404 );
        }

        $getPermission = PermissionModel::getRecord();

        $data[ 'getRole' ] = RoleModel::getRecord();
        return view ( 'panel.user.add', $data );
    }

    public function insert( Request $request )
 {
        $PermissionUser = PermissionRoleModel::getPermission( 'Add User', Auth::user()->role_id );
        if ( empty( $PermissionUser ) )
 {
            abort( 404 );
        }
        request()->validate( [
            'email' => 'required|email|unique:users',
        ] );
        $user = new User;
        $user->name = trim( $request->name );

        $user->email = trim( $request->email );

        $user->password = Hash::make( $request->password );

        $user->role_id = trim( $request->role_id );
        $user->save();

        return redirect( 'panel/user' )->with( 'success', 'Usuario creado con éxito' );
    }

    public function edit( $id )
 {
        $PermissionUser = PermissionRoleModel::getPermission( 'Edit User', Auth::user()->role_id );
        if ( empty( $PermissionUser ) ) {
            abort( 404 );
        }

        $data[ 'getRecord' ] = User::getSingle( $id );

        $data[ 'getRole' ] = RoleModel::getRecord();

        $data[ 'getRolePermission' ] = PermissionRoleModel::getRolePermission( $id );
        return view ( 'panel.user.edit', $data );

    }

    public function update( $id, Request $request )
 {
        $PermissionUser = PermissionRoleModel::getPermission( 'Edit User', Auth::user()->role_id );
        if ( empty( $PermissionUser ) ) {
            abort( 404 );
        }

        $user = User::getSingle( $id );
        $user->name = trim( $request->name );

        if ( !empty( $request->password ) )
 {
            $user->password = Hash::make( $request->password );

        }

        $user->role_id = trim( $request->role_id );
        $user->estado = 1;
        $user->save();

        return redirect( 'panel/user' )->with( 'success', 'Usuario actualizado correctamente' );

    }

    public function delete( $id )
 {
        $PermissionUser = PermissionRoleModel::getPermission( 'Delete User', Auth::user()->role_id );
        if ( empty( $PermissionUser ) ) {
            abort( 404 );
        }

        $user = User::getSingle( $id );
        $user->delete();

        return redirect( 'panel/user' )->with( 'success', 'Usuario borrado éxitosamente' );
    }

    public function toggleStatus( $id )
 {
        $PermissionUser = PermissionRoleModel::getPermission( 'Edit User', Auth::user()->role_id );
        if ( empty( $PermissionUser ) ) {
            abort( 404 );
        }

        $user = User::findOrFail( $id );

        // Validar que el estado es válido ( opcional )
        if ( !in_array( $user->estado, [ 0, 1 ] ) ) {
            return redirect()->back()->with( 'error', 'Estado inválido.' );
        }

        // Alternar el estado ( si es 1, pasa a 0 y viceversa )
        $user->estado = $user->estado == 1 ? 0 : 1;
        $user->save();

        return redirect( 'panel/user' )->with( 'success', 'Estado actualizado correctamente' );
    }
}
