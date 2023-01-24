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
        'date',
        'psychologiste_id',
        'patient_id',
    ];

    public function saveSession($data){
        return $this->create($data);
    }

    public function recupereSessionsPsyco($id){
        $data = $this::where('psychologiste_id',$id)->get();
        return $data;
    }
    
    
}
