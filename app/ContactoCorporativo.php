<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContactoCorporativo extends Model
{
    protected $table = 'tw_contactos_corporativos';
    protected $primaryKey = 'id';

    public $timestamps = false;

    protected $fillable = [
        'S_Nombre',
        'S_Puesto',
        'S_Comentarios',
        'N_TelefonoFijo',
        'N_TelefonoMovil',
        'S_Email',
        'tw_corporativos_id'
    ];

    public function corporativos(){
        return $this->belongsTo(Corporativo::class);
    }
}
