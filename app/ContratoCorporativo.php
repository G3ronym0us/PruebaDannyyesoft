<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContratoCorporativo extends Model
{
    protected $table = 'tw_contratos_corporativos';
    protected $primaryKey = 'id';

    public $timestamps = false;

    protected $fillable = [
        'D_FechaInicio',
        'D_FechaFin',
        'S_URLContrato',
        'tw_corporativos_id'
    ];

    public function corporativos(){
        return $this->belongsTo(Corporativo::class);
    }
}
