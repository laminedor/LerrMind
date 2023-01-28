<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Message extends Model
{
    protected $table = 'messages';
    protected $fillable = ['id','content','dateSend','session_id','envoyeur','dateReceive'];
    use HasFactory;

    public function store($data){
        $sms = new Message();
        $result = $sms->create($data);
        return $result;
    }


    public function recupereMessages($data){  
        $data = $this::where('envoyeur',$data['envoyeur'])
                        ->where('session_id',$data['session_id'])
                        ->where('dateReceive',NULL)->get();
        
        if($data != null){
            foreach($data as $dat){
                $dat-> dateReceive = date('Y-m-d H:i:s');
                $dat->save();
            }
        }
        return $data;
    }
    public function NotifMessage(){  
        $patient = Auth::guard('patient')->user();
        $psyco = Auth::guard('psycologue')->user();
        $envoyeur = 'patient';
        if($patient != null){
            $envoyeur = 'psycologue';
        }

        $session = new Sessions();

        if($psyco != null){
            $sessions = $session->recupereSessionsPsyco($psyco->id);
            foreach($sessions as $session){
                if($this::where('envoyeur',$envoyeur)->where('session_id',$session->id)->where('dateReceive',NULL)->exists()){
                    return 1;
                }
            }
        }
        if($patient != null){
            $sessions = $session->recupereSessionsPatient($patient->id);
            foreach($sessions as $session){
                if($this::where('envoyeur',$envoyeur)->where('session_id',$session->id)->where('dateReceive',NULL)->exists()){
                    return 1;
                }
            }
        }
        return 0;   
    }


    public function messagesSession($id){  
        if($this::where('session_id',$id)->exists()){
            $patient = Auth::guard('patient')->user();
            $envoyeur = 'patient';
            if($patient == null){
                $envoyeur = 'psycologue';
                
            }
            $data = $this::where('session_id',$id)->get();
            if($data != null){
                foreach($data as $dat){
                    if($dat-> dateReceive == null and $dat->envoyeur != $envoyeur)
                        $dat-> dateReceive = date('Y-m-d H:i:s');
                    $dat->save();
                }
            }
            return $data;
        }   
        return -1;
    }
}
