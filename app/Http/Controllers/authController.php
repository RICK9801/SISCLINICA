<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Hash;
use Illuminate\Support\Facades\Auth;



class authController extends Controller
{
    public function login()
    {
       //  dd(Hash::make(123456));

        return view('auth.login');
    }

    public function auth_login(Request $request)
    {
        // Buscar usuario por email
    $user = User::where('email', $request->email)->first();
        //dd($request->all());|
        $remember =  !empty($request->remember) ? true : false;    
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password], $remember))
        {    
          if ( $user->estado == 0 ) {
            return redirect()->back()->with( 'error', 'Tu cuenta está desactivada. Contacta al administrador.' );
        } else {

            return redirect( 'panel/dashboard' );
        }
        } 
         else
         {
              return redirect()->back()->with('error', "Please enter currect email and password");
         
         }
    }

    public function logout()
    {
      auth::logout();

      return redirect(url(''));
    }

    
}


// 
// use Hash;

// class authController extends Controller
// {
//     public function login()
//     {
//         // dd(Hash::make(123456));
// if(!empty(auth::check()))
// {
//   return reditect('panel/dasboard');
// }
//         return view('auth.login');
//     }

//     public function auth_login(Request $request)
//     { 
//         $remember =  !empty($Request->remember) ? true : false;    
//         if(Auth::attempt(['email' => $request->email, 'password' => $request->password], $remember))
//         {    
//           return redirect('panel/dashboard');
//         } 
//          else
//          {
//               return redirect()->back()->with('error', "Please enter currect email and password");
         
//          }
//    }     
//    public function logout()
//    {
//       Auth::logout();
//       return redirect(url(''));
//   }

// }

