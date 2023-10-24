<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Laracasts\Flash\Flash;

class MarcaEmisoraController extends AppBaseController
{

    public function __construct()
    {
        $this->middleware("auth");
    }
    public function index()
    {
        ##consulta tabla marcas
        $marcas = DB::table('marcas')->paginate(10);
        return view('marcas.index')->with('marcas', $marcas);
    }


    public function create()
    {
        return view('marcas.create');
    }


    public function show($mar_cod)
    {

        $marcas = DB::table("marcas")->where("mar_cod", $mar_cod)->first();

        if (empty($marcas)) {

            Flash::error("Registro no encontrado");

          return redirect(route("marcas.index"));
        }

        return view("marcas.show")->with("marca", $marcas);
    }


    public function store(Request $request)
    {
        $input = $request->all();

        ##grabar datos
        DB::insert("INSERT INTO marcas(mar_descrip) values(?)", [$input['mar_descrip']]);

        Flash::success("Registro guardado correctamente");

        return redirect(Route('Marca.index'));
    }


    public function edit($mar_cod)
    {
        $marcas = DB::select("SELECT * FROM marcas where mar_cod = ?", [$mar_cod]);

        if (empty($marcas) == 0) {
            Flash::error("Registro no encontrado!");

            redirect(route('Marca.index'));
        }
        return view('marcas.edit')->with('marcas', $marcas[0]);
    }


    public function update($mar_cod, Request $request)
    {
        $input = $request->all();
        $marcas = DB::table("marcas")->where("mar_cod", $mar_cod)->first();

        if (empty($marcas)) {
            Flash::error("Registro no encontrado");

            return redirect(route('Marca.index'));
        }
        DB::update("UPDATE marcas set mar_descrip = ? where mar_cod= ?", [$input['mar_descrip'], $mar_cod]);

        Flash::success("Registro actualizado correctamente");

        return redirect(route('Marca.index'));
    }


    public function destroy($mar_cod)
    {
        $marcas = DB::select("SELECT * FROM marcas where mar_cod = ?", [$mar_cod]);

        if (empty($marcas)) {
            Flash::error('registro no eliminado');

            return redirect(route('entidadEmisoras.index'));
        }

        ##borrar registro
        DB::delete("DELETE FROM marcas where mar_cod = ?", [$mar_cod]);


        Flash::success('Borrado con exito.');

        return redirect(route('Marca.index'));
    }

}
