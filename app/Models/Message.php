<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $table = 'messages';
    protected $fillable = ['id','content','date','session_id','envoyeur'];
    use HasFactory;

    public function store($data){
        $sms = new Message();
        $result = $sms->create($data);
        return $result;
    }


    public function recupereMessages($data){
        
        $data = $this::where('envoyeur',$data['envoyeur'])->get();
        return $data;
    }
}
