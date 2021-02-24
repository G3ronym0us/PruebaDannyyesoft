<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class Usuario extends Authenticatable
{
    use HasApiTokens, Notifiable;

    protected $table = 'tw_usuarios';
    protected $primaryKey = 'id';

    public $timestamps = true;

    protected $fillable = [
        'username',
        'email',
        'S_Nombre',
        'S_Apellido',
        'S_FotoPerfilUrl',
        'S_Activo',
        'password',
        'verification_token',
        'verifed'
    ];

    public function corporativos(){
        return $this->hasMany(Corporativo::class);
    }
}
