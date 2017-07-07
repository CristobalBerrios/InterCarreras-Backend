<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Equipo;

class EquipoApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $equipos = Equipo::all();

        return response()->json($equipos,200);
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
            

            $equipo = new Equipo($request->all());

            $equipo->save();

            if (!isset($equipo)) {

                return response()->json(['status'=>true,'Great thanks'],200);
            }


        }catch (\Exception $e){
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
            $equipo = Equipo::find($id);
            

            if (!isset($equipo)) {
                $datos = [
                    'errors' => true,
                    'msg' => 'No se encontró el equipo con ID = ' . $id,
                ];
                $equipo = \Response::json($datos, 404); 
            }

        }catch(\Exception $e){

            Log::critical("equipo no encontrado {$e->getCode()}, {$e->getLine()}, {$e->getMessage()}");
            return response('Error al buscar', 500); 
        }

        return $equipo;
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
        $equipo = Equipo::find($id); 
        $equipo->fill($request->all());
        $equipoRetorno= $equipo->save();
          
            if (isset($equipoRetorno)){
                $equipo = \Response::json(['msj'=>'se actualizo'], 200);
            }else{
                $equipo = \Response::json(['error' => 'No se actualizo el jugador'] , 404);
            }


       return $equipo;
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
            $equipo = Equipo::find($id);

            if (!isset($equipo)) {
                return response()->json(['Equipo no existe'],404); 
            }

            $equipo->delete();
            return response()->json('Equipo Eliminado',200);

        }catch(\Exception $e){
            Log::critical("Error: {$e->getCode()}, {$e->getLine()}, {$e->getMessage()}");
            return response('Error', 500); 
        }
    }
}
