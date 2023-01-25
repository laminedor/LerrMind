<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
        $data = $this::where('envoyeur',$data['envoyeur'])->where('dateReceive',NULL)->get();
        
        if($data != null){
            foreach($data as $dat){
                $dat-> dateReceive = date('Y-m-d H:i:s');
                $dat->save();
            }
        }
        return $data;
    }
}
