<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    protected $redirectTo = '/dashboard'; // Ajusta la ruta de redirección después de loguearse

    // Este método maneja la autenticación
    public function login(Request $request)
    {
        // Validación de los datos de login
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Intentar autenticar al usuario
        if (Auth::attempt([
            'email' => $request->email,
            'password' => $request->password
        ], $request->remember)) {
            // Redirige a la página de viáticos si la autenticación es exitosa
            return redirect()->route('viaticos.create'); // Cambiado a route()
        }

        // Si no se autentica correctamente, muestra el error
        return back()->withErrors([
            'email' => 'Las credenciales no coinciden con nuestros registros.',
        ]);
    }

    // Muestra el formulario de login
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // Método para logout
    public function logout(Request $request)
    {
        Auth::logout();  // Este método cierra la sesión
        $request->session()->invalidate(); // Invalida la sesión
        $request->session()->regenerateToken(); // Regenera el token de la sesión para evitar CSRF
        return redirect('/login');  // Redirige a la página de login
    }
}
