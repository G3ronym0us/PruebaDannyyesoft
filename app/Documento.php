<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Documento extends Model
{
    protected $table = 'tw_documentos';
    protected $primaryKey = 'id';

    public $timestamps = false;

    protected $fillable = [
        'S_Nombre',
        'N_Obligatorio',
        'S_Descripcion',
    ];

    public function documentos_corporativos(){
        return $this->hasMany(DocumentoCorporativo::class,'tw_documentos_id','id');
    }
}
