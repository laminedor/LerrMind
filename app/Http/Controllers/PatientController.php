<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PatientController extends Controller
{
    //

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
