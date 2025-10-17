<?php

namespace App\Http\Controllers;

use App\Models\Tratamientos;
use Illuminate\Http\Request;

class TratamientosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['getRecord'] = Tratamientos::all();
        return view('panel.tratamientos.list', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('panel.tratamientos.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //  dd($request);
//         $permissionCategory = PermissionRoleModel::getPermission( 'Add Category', Auth::user()->role_id );
//         if ( empty( $permissionCategory ) )
//  {
//             abort( 404 );
//         }      
        $tratamientos = new Tratamientos();
        $tratamientos->descripcion = trim( $request->descripcion );
        $tratamientos->fecha_inicio = trim( $request->fecha_inicio );
        $tratamientos->costo = trim( $request->costo );
        $tratamientos->save();
        // dd($tratamientos);
        // PermissionRoleModel::InserUpdateRecord($request->permission_id, $save->id);
        return redirect('panel/tratamientos')->with('success', "tratamiento creado con éxito");
        // return back();
        
   }

    /**
     * Display the specified resource.
     */
    public function show(Tratamientos $tratamientos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $data['getRecord'] = Tratamientos::getSingle($id);
        return view('panel.tratamientos.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update($id, Request $request)
    {
        // $permissionCategory = PermissionRoleModel::getPermission( 'Edit Category', Auth::user()->role_id );
        // if ( empty( $permissionCategory ) ) {
        //     abort( 404 );
        // }

        $tratamientos = Tratamientos::getSingle( $id );
        $tratamientos->descripcion = $request->descripcion;
        $tratamientos->fecha_inicio = $request->fecha_inicio;
        $tratamientos->costo = $request->costo;
        $tratamientos->estado = $request->estado;
        $tratamientos->save();

        return redirect('panel/tratamientos')->with('success', 'Odontólogo actualizado con éxito');
  
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Tratamientos::getSingle($id)->delete();
        return redirect('panel/tratamientos')->with('success', 'tratamiento eliminado');
    }
}
