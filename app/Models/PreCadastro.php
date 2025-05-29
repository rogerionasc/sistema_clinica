<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PreCadastro extends Model
{
    use HasFactory;

    protected $table = 'pre_cadastro';

    protected $fillable = [
        'nome',
        'sobrenome',
        'cpf',
        'telefone',
        'data_nascimento',
        'email',
        'password',
    ];
}
