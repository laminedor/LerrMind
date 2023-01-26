<?php

namespace App\Http\Controllers;

use App\Models\Psycologue;
use App\Models\Sessions;
use App\Models\Specialite;
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
        
        $Psycologue = new Psycologue();
        $Psycologue = $Psycologue->psycho($idPsycologue);


        $modelSpec = new Specialite();
        $listeSpecs = $modelSpec->get();


        foreach($listeSpecs as $Specs){
            if($Psycologue->specialite_id == $Specs->id){
                $Psycologue->specialite_id = $Specs->name;
            }
        }


        return view('PageChatPatient', compact('session','Psycologue'));
    }
}
