<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Corporativo extends Model
{
    protected $table = 'tw_corporativos';
    protected $primaryKey = 'id';

    public $timestamps = true;

    protected $fillable = [
        'S_NombreCorto',
        'S_NombreCompleto',
        'S_LogoURL',
        'S_DBName',
        'S_DBUsuario',
        'S_DBPassword',
        'S_SystemUrl',
        'S_Activo',
        'D_FechaIncorporacion',
        'tw_usuarios_id'
    ];

    public function usuarios(){
        return $this->belongsTo(Usuario::class);
    }

    public function empresas_corporativos(){
        return $this->hasMany(EmpresaCorporativo::class,'tw_corporativos_id','id');
    }

    public function contactos_corporativos(){
        return $this->hasMany(ContactoCorporativo::class,'tw_corporativos_id','id');
    }

    public function contratos_corporativos(){
        return $this->hasMany(ContratoCorporativo::class,'tw_corporativos_id','id');
    }

    public function documentos_corporativos(){
        return $this->hasMany(DocumentoCorporativo::class,'tw_corporativos_id','id');
    }
}
