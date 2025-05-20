<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PreUser extends Model
{
    use HasFactory;

    protected $table = 'pre_users';

    protected $fillable = [
        'name',
        'email',
        'password',
        // Adicione outros campos conforme necessário
    ];
}
