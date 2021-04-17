<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contato extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'endereco',
        'codigo_pais',
        'codigo_cidade',
        'telefone',
        'email',
        'foto',
    ];
}
