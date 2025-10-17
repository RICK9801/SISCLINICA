<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RoleModel;
use App\Models\User;
// use Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class CategoriaController extends Controller
{
    public function list()
    {               
        $data['getRecord'] = User::getRecord();
        return view ('panel.categoria.list', $data);
    }  

    public function add()
    {        
        $data['getRole'] = RoleModel::getRecord();
        return view ('panel.categoria.add', $data);
    }

    public function edit($id)
    {    
        $data['getRecord'] = User::getSingle($id);  
        $data['getRole'] = RoleModel::getRecord();
        return view ('panel.categoria.edit', $data);   
    }

    public function insert(Request $request)
    {        
       request()->validate([
        'email' => 'required|email|unique:users',
       ]);
       $user = new User;
       $user->name = trim($request->name);       
       $user->email = trim($request->email);      
    
       $user->role_id = trim($request->role_id);
       $user->save();

       return redirect('panel/categoria')->with('success', "Categoria creado con éxito");
    }
    

    public function update($id, Request $request)
    {       
       //$user = new User;
       $user = User::getSingle($id);
       $user->name = trim($request->name);    
       if(!empty($request->password))
       {
        $user->password = Hash::make($request->password); 
       }   
       $user->role_id = trim($request->role_id);
       $user->save();

       return redirect('panel/categoria')->with('success', "Categoria actualizado correctamente");
    }

    public function delete($id)
    {       
       $user = User::getSingle($id);
       $user->delete();

       return redirect('panel/categoria')->with('success', "Categoria borrado éxitosamente");
    }   
  
}