<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Documento;
use App\DocumentoCorporativo;
use App\Http\Requests\DocumentoRequest;
use Illuminate\Support\Facades\DB;

class DocumentoController extends Controller
{
    public function __construct(Documento $documento)
    {
        $this->documento = $documento;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json($this->documento->orderBy('id', 'desc')->get());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DocumentoRequest $request)
    {
        $documento = $this->documento->create([
            'S_Nombre'         => $request->S_Nombre,
            'N_Obligatorio'    => $request->N_Obligatorio,
            'S_Deescripcion'   => $request->S_Deescripcion
        ]);

        return response()->json($documento, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Documento $documento)
    {
        return response()->json($documento);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(DocumentoRequest $request, Documento $documento)
    {
        $documento->update($request->all());
        return response()->json($documento);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Documento $documento)
    {
        $documento->delete();
        return response()->json(null,204); 
    }

    public function seleccionar($id){
        $documentos = DB::table('tw_corporativos')
                            ->join('tw_documentos_corporativos','tw_corporativos.id','=','tw_documentos_corporativos.tw_corporativos_id')
                            ->where('tw_documentos_corporativos.tw_documentos_id','=',$id)
                            ->get();
        return response()->json($documentos);
    }
}
