<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WpUsuario extends Model
{
    protected $fillable = [
        'nome', 'username', 'email', 'password',
    ];
}
