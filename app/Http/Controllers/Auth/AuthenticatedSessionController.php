<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use App\Http\Requests\Auth\LoginRequest;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     *
     * @param  \App\Http\Requests\Auth\LoginRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(LoginRequest $request)
    {

        $usuario = User::Where('email',$request['email'])->get();
       if(isset($usuario[0])){
           if($usuario[0]->estado == 0){
                $usuario[0]->estado = 1;
                $usuario[0]->save();
                $request->authenticate();
                $request->session()->regenerate();
                return view('pymes.perfil.editar-perfil')->with(['usuario' => $usuario[0], 'msg' => "¡HOLA DE NUEVO!"]); //RETORNAMOS LA VISTA Y LUEGO LE ENVIAMOS AL USUARIO LOGGEADO PARA PODER MOSTRAR SUS DATOS EN LA VISTA.
           }
       }

        $request->authenticate();

        $request->session()->regenerate();

        return redirect()->intended(RouteServiceProvider::HOME);
    }

    /**
     * Destroy an authenticated session.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
