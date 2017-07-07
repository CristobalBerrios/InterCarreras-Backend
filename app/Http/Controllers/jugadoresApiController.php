<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jugador;
use App\Equipo;
use App\carrera;

class jugadoresApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jugadores = Jugador::all();

        $datos = array();
        $cont = 0;

        foreach ($jugadores as $jugador) {
            $equipo = Equipo::find($jugador->equipo_id);
            $carrera = carrera::find($jugador->carrera_id);

            $datos[$cont]['id'] = $jugador->id;
            $datos[$cont]['matricula'] = $jugador->matricula;
            $datos[$cont]['nombre'] = $jugador->nombre;
            $datos[$cont]['apellido'] = $jugador->apellido;
            $datos[$cont]['correo'] = $jugador->correo;
            $datos[$cont]['estadistica'] = $jugador->estadistica;
            $datos[$cont]['carrera'] = $carrera;
            $datos[$cont]['equipo'] = $equipo;

            $cont++;
        }

        return response()->json($datos,200);
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
            

            $jugador = new Jugador($request->all());

            $jugador->save();

            if (!isset($jugador)) {

                return response()->json(['status'=>true,'Great thanks'],200);
            }


        }catch (\Exception $e){
            return response('Error al insertar'.$e, 500); 
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
            $jugador = Jugador::find($id);
            $equipo = Equipo::find($jugador->equipo_id);
            $carrera = carrera::find($jugador->carrera_id);

            $jugadorDatos = array();

            $jugadorDatos['id'] = $jugador->id;
            $jugadorDatos['matricula'] = $jugador->matricula;
            $jugadorDatos['nombre'] = $jugador->nombre;
            $jugadorDatos['apellido'] = $jugador->apellido;
            $jugadorDatos['correo'] = $jugador->correo;
            $jugadorDatos['estadistica'] = $jugador->estadistica;
            $jugadorDatos['carrera'] = $carrera;
            $jugadorDatos['equipo'] = $equipo;
            

            if (!isset($jugadorDatos)) {
                $datos = [
                    'errors' => true,
                    'msg' => 'No se encontró la pelicula con ID = ' . $id,
                ];
                $jugadorDatos = \Response::json($datos, 404); 
            }

        }catch(\Exception $e){

            Log::critical("jugador no encontrado {$e->getCode()}, {$e->getLine()}, {$e->getMessage()}");
            return response('Error al buscar', 500); 
        }

        return $jugadorDatos;
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

        
        $jugador = Jugador::find($id); 
        $jugador->fill($request->all());
        $jugadorRetorno= $jugador->save();
          
            if (isset($jugador)) {
                $jugador = \Response::json(['msj'=>'se actualizo'], 200);
            }else{
                $jugador = \Response::json(['error' => 'No se actualizo el jugador'] , 404);
            }


       return $jugador;
       
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
            $jugador = Jugador::find($id);

            if (!isset($jugador)) {
                return response()->json(['Jugador no existe'],404); 
            }

            $jugador->delete();
            return response()->json('Usuario Eliminado',200);

        }catch(\Exception $e){
            Log::critical("Error: {$e->getCode()}, {$e->getLine()}, {$e->getMessage()}");
            return response('Error', 500); 
        }
    }

/*
      public function bucarNombre($nombre)
    {
        try{
            $jugador = Jugador::find($nombre);
            

            if (!isset($jugador)) {
                $datos = [
                    'errors' => true,
                    'msg' => 'No se encontró la pelicula con Nombre= ' . $nombre,
                ];
                $jugador = \Response::json($datos, 404); 
            }

        }catch(\Exception $e){

            Log::critical("jugador no encontrado {$e->getCode()}, {$e->getLine()}, {$e->getMessage()}");
            return response('Error al buscar', 500); 
        }

        return $jugador;
    }

*/
}
