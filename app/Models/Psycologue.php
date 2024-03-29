<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Psycologue extends User
{
    protected $table = 'psychologistes';
    protected $fillable = [
        'id',
        'nom',
        'prenom',
        'email',
        'password',
        'specialite_id',
    ];
    use HasFactory;

    public function get(){
        return self::all();
    }

    public function psycho($id){
        return $this->where('specialite_id',$id)->first();
    }
}
