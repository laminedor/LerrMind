<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Specialite extends Model
{
    protected $table = 'specialites';
    protected $fillable = [
        'id',
        'name',
    ];
    use HasFactory;


    public function get(){
        return self::all();
    }
}
