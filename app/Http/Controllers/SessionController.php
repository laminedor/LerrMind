<?php

namespace App\Http\Controllers;

use App\Models\Sessions;
use Dflydev\DotAccessData\Data;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SessionController extends Controller
{
    //


    public function beginSession($idPsycologue){
        $patient = Auth::guard('patient')->user();
        
        $data = [
            'dateCreation'=> date('Y-m-d H:i:s'),
            'psychologiste_id' => $idPsycologue,
            'patient_id' => $patient->id,
        ];

        $SessionModel = new Sessions();

        $session = $SessionModel->saveSession($data);
        return view('PageChat', compact('session'));
    }
}
