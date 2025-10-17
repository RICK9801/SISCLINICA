<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\View;

class PasswordController extends Controller
{
    // Mostrar el formulario de solicitud de restablecimiento de contraseña
    public function showLinkRequestForm()
    {
        return view('auth.password.email');
    }

    // Manejar el envío del enlace de recuperación
    public function sendResetLinkEmail(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        $response = Password::sendResetLink($request->only('email'));

        // Depurar el valor de la respuesta
        if ($response === null) {
            // Si la respuesta es nula, maneja el error aquí
            return back()->withErrors(['email' => 'Ocurrió un problema al intentar enviar el enlace de restablecimiento de contraseña.']);
        }

        return $response == Password::RESET_LINK_SENT
            ? back()->with('status', __($response))
            : back()->withErrors(['email' => __($response)]);
    }


    // Mostrar el formulario para restablecer la contraseña
    public function showResetForm(Request $request, $token = null)
    {
        if (!$request->has('email')) {
            return redirect()->route('password.request')->withErrors(['email' => 'El correo electrónico es requerido.']);
        }
    
        return view('auth.password.reset')->with(
            ['token' => $token, 'email' => $request->email]
        );
    }

    // Manejar el restablecimiento de la contraseña
    public function reset(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed',
        ]);
    
        $response = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password) {
                $user->password = bcrypt($password);
                $user->save();
            }
        );
    
        return $response == Password::PASSWORD_RESET
            ? redirect()->route('login')->with('status', __($response))
            : back()->withErrors(['email' => __($response)]);
    }
}
