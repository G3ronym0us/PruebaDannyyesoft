<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\DocumentoCorporativo;
use App\Http\Requests\DocumentoCorporativoRequest;

class DocumentoCorporativoController extends Controller
{
    public function __construct(DocumentoCorporativo $documentoCorporativo)
    {
        $this->documentoCorporativo = $documentoCorporativo;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(
            $this->documentoCorporativo->orderBy('id', 'desc')->get()
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DocumentoCorporativoRequest $request)
    {
        $documentoCorporativo = $this->documentoCorporativo->create([
            'tw_corporativos_id'    => $request->tw_corporativos_id,
            'tw_documentos_id'      => $request->tw_documentos_id,
            'S_ArchivoUrl'          => $request->S_ArchivoUrl
        ]);

        return response()->json($documentoCorporativo, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return response()->json(DocumentoCorporativo::find($id));
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
    public function update(DocumentoCorporativoRequest $request, $id)
    {
        $documentoCorporativo = DocumentoCorporativo::find($id);
        $documentoCorporativo->update($request->all());
        return response()->json($documentoCorporativo);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $documentoCorporativo = DocumentoCorporativo::find($id);
        $documentoCorporativo->delete();
        return response()->json(null,204);
    }
}
