<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Laracasts\Flash\Flash;

class CiudadController extends AppBaseController
{

    public function __construct()
    {
        $this->middleware("auth");
    }
    
    public function index()
    {
        ##consulta tabla marcas
        $ciudads = DB::table('ciudad')->paginate(10);
        return view('ciudads.index')->with('ciudads', $ciudads);
    }


    public function create()
    {
        return view('ciudads.create');
    }


    public function show($ciu_descripcion)
    {

        $ciudads = DB::table("ciudad")->where("ciu_descripcion", $ciu_descripcion)->first();

        if (empty($ciudads)) {

            Flash::error("Registro no encontrado");

          return redirect(route("Ciudad.index"));
        }

        return view("ciudads.show")->with("ciudads", $ciudads);
    }


    public function store(Request $request)
    {
        $input = $request->all();

        ##grabar datos
        DB::insert("INSERT INTO ciudad(ciu_descripcion) values(?)", [$input['ciu_descripcion']]);

        Flash::success("Registro guardado correctamente");

        return redirect(Route('ciudads.index'));
    }


    public function edit($id_ciudad)
    {
        $ciudads = DB::select("SELECT * FROM ciudad where ciu_descripcion = ?", [$id_ciudad]);

        if (empty($ciudads) == 0) {
            Flash::error("Registro no encontrado!");

            redirect(route('ciudads.index'));
        }
        return view('ciudads.edit')->with('ciudads', $ciudads[0]);
    }


    public function update($id_ciudad, Request $request)
    {
        $input = $request->all();
        $ciudads = DB::table("ciudad")->where("ciu_descripcion", $id_ciudad)->first();
    
        if (empty($ciudads)) {
            Flash::error("Registro no encontrado");
            return redirect(route('ciudads.index'));
        }
    
        // Utiliza el método update para actualizar el registro en la base de datos
        DB::update("UPDATE ciudad set ciu_descripcion = ? where ciu_descripcion= ?", [$input['ciu_descripcion'], $id_ciudad]);
    
        Flash::success("Registro actualizado correctamente");
    
        return redirect(route('ciudads.index'));
    }
    


    public function destroy($id_ciudad)
    {
        $ciudads = DB::select("SELECT * FROM ciudad where ciu_descripcion = ?", [$id_ciudad]);

        if (empty($ciudads)) {
            Flash::error('registro no eliminado');

            return redirect(route('ciudads.index'));
        }

        ##borrar registro
        DB::delete("DELETE FROM ciudad where ciu_descripcion = ?", [$id_ciudad]);


        Flash::success('Borrado con exito.');

        return redirect(route('ciudads.index'));
    }
}
