<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthentificationController extends Controller
{
    //

    public function authentification(Request $request)
    {
        $credentials = $request->only('email', 'password');
        $user_type = $request->user_type;
        if($user_type == 'patient'){
            if (Auth::guard('patient')->attempt($credentials)) {
                // Authentication passed...
                return redirect()->route('listePsycologue');
            }else{
                // Authentication failed...
                return redirect()->back()->withErrors(['email' => 'Les informations d\'identification fournies sont incorrectes.']);
            }
        }elseif($user_type == 'psycologue'){
            if (Auth::guard('psycologue')->attempt($credentials)) {
                // Authentication passed...
                return redirect()->route('chatPsycologue');
            }else{
                // Authentication failed...
                return redirect()->back()->withErrors(['email' => 'Les informations d\'identification fournies sont incorrectes.']);
            }
        }
    }

    public function deconnexion()
    {
        if (Auth::guard('patient')->check()) {
            Auth::guard('patient')->logout();
        }elseif (Auth::guard('psycologue')->check()) {
            Auth::guard('psycologue')->logout();
        }
        return redirect('/');
    }

   

    

}
