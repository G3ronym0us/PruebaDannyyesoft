<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\CorporativoRequest;
use App\Corporativo;

class CorporativoController extends Controller
{
    public function __construct(Corporativo $corporativo)
    {
        $this->corporativo = $corporativo;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(
            $this->corporativo->orderBy('id', 'desc')->where('S_Activo','=',true)->get()
        );
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
    public function store(CorporativoRequest $request)
    {
        $corporativo = $this->corporativo->create([
            'S_NombreCorto'         => $request->S_NombreCorto,
            'S_NombreCompleto'      => $request->S_NombreCompleto,
            'S_DBName'              => $request->S_DBName,
            'S_DBUsuario'           => $request->S_DBUsuario,
            'S_DBPassword'          => $request->S_DBPassword,
            'S_SystemUrl'           => $request->S_SystemUrl,
            'S_Activo'              => true,
            'D_FechaIncorporacion'  => $request->D_FechaIncorporacion,
            'tw_usuarios_id'        => $request->tw_usuarios_id
        ]);

        return response()->json($corporativo, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Corporativo $corporativo)
    {
        return response()->json($corporativo);
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
    public function update(Request $request, Corporativo $corporativo)
    {
        $corporativo->update($request->all());
        return response()->json($corporativo);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Corporativo $corporativo)
    {
        $corporativo->update([
            'S_Activo' => false
        ]);
        return response()->json(null, 204);
    }

    public function getAll($id){
        $corporativo = Corporativo::find($id);
        $corporativo->empresas_corporativos;
        $corporativo->contratos_corporativos;
        $corporativo->contactos_corporativos;
        $corporativo->documentos_corporativos;

        return response()->json($corporativo);
    }
}
