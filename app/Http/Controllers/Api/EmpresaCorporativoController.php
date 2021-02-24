<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\EmpresaCorporativo;
use App\Http\Requests\EmpresaCorporativoRequest;

class EmpresaCorporativoController extends Controller
{
    public function __construct(EmpresaCorporativo $empresaCorporativo)
    {
        $this->empresaCorporativo = $empresaCorporativo;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(
            $this->empresaCorporativo->orderBy('id', 'desc')->where('S_Activo','=',true)->get()
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
    public function store(EmpresaCorporativoRequest $request)
    {
        $empresaCorporativo = $this->empresaCorporativo->create([
            'S_RazonSocial'         => $request->S_RazonSocial,
            'S_RFC'                 => $request->S_RFC,
            'S_Pais'                 => $request->S_Pais,
            'S_Estado'                 => $request->S_Estado,
            'S_Municipio'                 => $request->S_Municipio,
            'S_ColoniaLocalidad'                 => $request->S_ColoniaLocalidad,
            'S_Domicilio'                 => $request->S_Domicilio,
            'S_CodigoPostal'                 => $request->S_CodigoPostal,
            'S_UsoCFDI'                 => $request->S_UsoCFDI,
            'S_UrlRFC'                 => $request->S_UrlRFC,
            'S_UrlActaConstitutiva'                 => $request->S_UrlActaConstitutiva,
            'S_Activo'              => true,
            'S_Comentarios'                 => $request->S_Comentarios,
            'tw_corporativos_id'                 => $request->tw_corporativos_id,
        ]);

        return response()->json($empresaCorporativo, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return response()->json(EmpresaCorporativo::find($id));
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
    public function update(EmpresaCorporativoRequest $request, $id)
    {
        $empresaCorporativo = EmpresaCorporativo::find($id);
        $empresaCorporativo->update($request->all());
        return response()->json($empresaCorporativo);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $empresaCorporativo = EmpresaCorporativo::find($id);
        $empresaCorporativo->update([
            'S_Activo' => false
        ]);
        return response()->json(null, 204);
    }
}
