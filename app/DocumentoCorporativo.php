<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DocumentoCorporativo extends Model
{
    protected $table = 'tw_documentos_corporativos';
    protected $primaryKey = 'id';

    public $timestamps = false;

    protected $fillable = [
        'tw_corporativos_id',
        'tw_documentos_id',
        'S_ArchivoUrl'
    ];

    public function corporativos(){
        return $this->belongsTo(Corporativo::class);
    }

    public function documentos(){
        return $this->belongsTo(Documento::class);
    }
}
