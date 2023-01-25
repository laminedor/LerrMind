<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Psy\Readline\Hoa\Console;

class MessageController extends Controller
{
    //


    public function sendSms(Request $request)
    {
        date_default_timezone_set('Africa/Dakar');
        $data = [
            'dateSend'=> date('Y-m-d H:i:s'),
            'content'=>$request->message,
            'session_id'=>$request->idSession,
            'envoyeur'=>$request->envoyeur,
        ];


        $ModelMessage = new Message();
        $ModelMessage = $ModelMessage->store($data); 
    }

    public function recupSms(Request $request)
    {
        $idSession = $request->input('idSession');
        date_default_timezone_set('Africa/Dakar');

        $patient = Auth::guard('patient')->user();
        $envoyeur = 'psycologue';
        if($patient == null){
            $envoyeur = 'patient';
        }

        $ModelMessage = new Message();


        $data2 = [
            'session_id'=>$idSession,
            'envoyeur'=>$envoyeur,
        ];
        
        $data = $ModelMessage->recupereMessages($data2);
        $data = response()->json($data);
        return $data;
    }



    
}
