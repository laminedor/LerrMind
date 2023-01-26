<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sessions extends Model
{
    use HasFactory;
    protected $table = 'sessions';
    protected $fillable = [
        'id',
        'dateCreation',
        'psychologiste_id',
        'patient_id',
    ];

    public function saveSession($data){
        $data2 = $this::where('psychologiste_id',$data['psychologiste_id'])
                    ->where('patient_id',$data['patient_id'])->first();
        if($data2 == null)
            return $this->create($data);
        return $data2;
    }

    public function recupereSessionsPsyco($id){
        $data = $this::where('psychologiste_id',$id)->get();
        return $data;
    }
    
    
}
