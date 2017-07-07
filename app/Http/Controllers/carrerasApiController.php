<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\carrera;

class carrerasApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $carreras  = carrera::all()->toArray();

        return response()->json($carreras, 200);
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
            $carrera = new carrera([
                'nombre'          => $request->input('nombre'),
            
            

                ]);

            $carrera->save();

            if (!isset($carrera)) {

                return response()->json(['status'=>true,'Great thanks'],200);
            }


        }catch (\Exception $e){
            Log::critical("carrera no creado {$e->getCode()}, {$e->getLine()}, {$e->getMessage()}");
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
            $carrera = carrera::find($id);
            

            if (!isset($carrera)) {
                $datos = [
                    'errors' => true,
                    'msg' => 'No se encontró la pelicula con ID = ' . $id,
                ];
                $carrera = \Response::json($datos, 404); 
            }

        }catch(\Exception $e){

            Log::critical("carrera no encontrado {$e->getCode()}, {$e->getLine()}, {$e->getMessage()}");
            return response('Error al buscar', 500); 
        }

        return $carrera;
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
            $carrera = carrera::find($id);

            if (!isset($carrera)) {
                return response()->json(['carrera no existe'],404); 
            }

            $carrera->delete();
            return response()->json('carrera Eliminado',200);

        }catch(\Exception $e){
            Log::critical("Error: {$e->getCode()}, {$e->getLine()}, {$e->getMessage()}");
            return response('Error', 500); 
        }
    }
}
