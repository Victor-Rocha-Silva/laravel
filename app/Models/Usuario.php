<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    use HasFactory;
    protected $table = ['usuarios'];
    protected $fileable = [
    'id', 
    'created_at', 
    'updated_at', 
    'nome', 
    'email', 
    'foto', 
    'senha', 
    'status', 
    'ativo'
];
}
