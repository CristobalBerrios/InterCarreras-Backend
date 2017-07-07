<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Grupo;

class GrupoApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $grupos = Grupo::all();

        return response()->json($grupos,200);
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
    public function store(Request $request)
    {
        try{
            $grupo = new Grupo([
                'descripcion' => $request->input('descripcion'),
                'nombre'    => $request->input('nombre')


                ]);

            $grupo->save();

            if (!isset($grupo)) {

                return response()->json(['status'=>true,'Great thanks'],200);
            }


        }catch (\Exception $e){
            Log::critical("grupo no creado {$e->getCode()}, {$e->getLine()}, {$e->getMessage()}");
            return response('Error al insertar', 500); 
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try{
            $grupo = Grupo::find($id);
            

            if (!isset($grupo)) {
                $datos = [
                    'errors' => true,
                    'msg' => 'No se encontró la grupo con ID = ' . $id,
                ];
                $grupo = \Response::json($datos, 404); 
            }

        }catch(\Exception $e){

            Log::critical("grupo no encontrado {$e->getCode()}, {$e->getLine()}, {$e->getMessage()}");
            return response('Error al buscar', 500); 
        }

        return $grupo;
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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{
            $grupo = Grupo::find($id);

            if (!isset($grupo)) {
                return response()->json(['grupo no existe'],404); 
            }

            $grupo->delete();
            return response()->json('grupo Eliminado',200);

        }catch(\Exception $e){
            Log::critical("Error: {$e->getCode()}, {$e->getLine()}, {$e->getMessage()}");
            return response('Error', 500); 
        }
    }
}
