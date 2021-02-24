<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\ContactoCorporativo;
use App\Http\Requests\ContactoCorporativoRequest;

class ContactoCorporativoController extends Controller
{
    public function __construct(ContactoCorporativo $contactoCorporativo)
    {
        $this->contactoCorporativo = $contactoCorporativo;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(
            $this->contactoCorporativo->orderBy('id', 'desc')->get()
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
    public function store(ContactoCorporativoRequest $request)
    {
        $contactoCorporativo = $this->contactoCorporativo->create([
            'S_Nombre'              => $request->S_Nombre,
            'S_Puesto'              => $request->S_Puesto,
            'S_Comentarios'         => $request->S_Comentarios,
            'N_TelefonoFijo'        => $request->N_TelefonoFijo,
            'N_TelefonoMovil'       => $request->N_TelefonoMovil,
            'S_Email'               => $request->S_Email,
            'tw_corporativos_id'    => $request->tw_corporativos_id
        ]);

        return response()->json($contactoCorporativo, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return response()->json(ContactoCorporativo::find($id));
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
    public function update(ContactoCorporativoRequest $request, $id)
    {
        $contactoCorporativo = ContactoCorporativo::find($id);
        $contactoCorporativo->update($request->all());
        return response()->json($contactoCorporativo);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $contactoCorporativo = ContactoCorporativo::find($id);
        $contactoCorporativo->delete();
        return response()->json(null,204);
    }
}
