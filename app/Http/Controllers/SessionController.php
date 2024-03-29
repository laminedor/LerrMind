<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\Psycologue;
use App\Models\Sessions;
use App\Models\Specialite;
use Dflydev\DotAccessData\Data;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use function PHPSTORM_META\type;

class SessionController extends Controller
{
    //


    public function beginSession(Request $request){
        $patient = Auth::guard('patient')->user();
        
        $data = [
            'dateCreation'=> date('Y-m-d H:i:s'),
            'psychologiste_id' => $request->id,
            'patient_id' => $patient->id,
            'titre' => $request->titre,
            'description' => $request->description,
        ];

        $SessionModel = new Sessions();
        
        $session = $SessionModel->saveSession($data);
        
        $Psycologue = new Psycologue();
        $Psycologue = $Psycologue->psycho($request->id);


        $modelSpec = new Specialite();
        $listeSpecs = $modelSpec->get();


        foreach($listeSpecs as $Specs){
            if($Psycologue->specialite_id == $Specs->id){
                $Psycologue->specialite_id = $Specs->name;
            }
        }

        //recupere les anciens messages
        
        return view('PageChatPatient', compact('session','Psycologue'));
    }

    public function continuerSession($idSession){
        


        $SessionModel = new Sessions();
        
        $session = $SessionModel->recupereSessions($idSession);
        
        $Psycologue = new Psycologue();
        $Psycologue = $Psycologue->psycho($session->psychologiste_id );


        $modelSpec = new Specialite();
        $listeSpecs = $modelSpec->get();


        foreach($listeSpecs as $Specs){
            if($Psycologue->specialite_id == $Specs->id){
                $Psycologue->specialite_id = $Specs->name;
            }
        }

        //recupere les anciens messages
        
        return view('PageChatPatient', compact('session','Psycologue'));
    }


    public function sessionPsycho($id){
        $psyco = Auth::guard('psycologue')->user();
        $session = new Sessions();
        $session = $session->recupereSessions($id);
        return view('PageChatPsycho', compact('session'));
    }



    public function listeSessions(){
        $psyco = Auth::guard('psycologue')->user();
        $modelSessions = new Sessions();
        $sessions= $modelSessions->recupereSessionsPsyco($psyco->id);
        return view('listeSessions',compact('sessions'));
    }
}
