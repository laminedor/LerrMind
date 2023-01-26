<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{
    //

    public function homeChatPatient(){
        
        return view('PageChatPatient');
    }
}
