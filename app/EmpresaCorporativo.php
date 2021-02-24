<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmpresaCorporativo extends Model
{
    protected $table = 'tw_empresas_corporativos';
    protected $primaryKey = 'id';

    public $timestamps = true;

    protected $fillable = [
        'S_RazonSocial',
        'S_RFC',
        'S_Pais',
        'S_Estado',
        'S_Municipio',
        'S_ColoniaLocalidad',
        'S_Domicilio',
        'S_CodigoPostal',
        'S_UsoCFDI',
        'S_UrlRFC',
        'S_UrlActaConstitutiva',
        'S_Activo',
        'S_Comentarios',
        'tw_corporativos_id'
    ];

    public function corporativos(){
        return $this->belongsTo(Corporativo::class);
    }
}
