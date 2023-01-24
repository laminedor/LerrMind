<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends user
{
    protected $table = 'patients';
    protected $fillable = [
        'id',
        'nom',
        'prenom',
        'email',
        'password',
    ];
    use HasFactory;
}
