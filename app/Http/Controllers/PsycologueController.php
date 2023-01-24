<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\Psycologue;
use App\Models\Sessions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PsycologueController extends Controller
{
    public function listePsycologue(){
        
        $modelPsy = new Psycologue();
        $listePsycologues = $modelPsy->get();
        
        return view('listePsycologue',compact('listePsycologues'));
    }

    public function chatPsycologue(){
        $psyco = Auth::guard('psycologue')->user();
        
        $session = new Sessions();
        $session = $session->recupereSessionsPsyco($psyco->id);
        $session = $session[0];
        return view('PageChat', compact('session'));
    }
}
