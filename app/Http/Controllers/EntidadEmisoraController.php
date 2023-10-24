<?php

namespace App\Http\Controllers;

use App\Models\EntidadEmisora;
use Illuminate\Http\Request;
use Illuminate\Routing\RouteAction;
use Illuminate\Support\Facades\DB;
use Laracasts\Flash\Flash;

class EntidadEmisoraController extends AppBaseController

{

    public function __construct()
    {
        $this->middleware("auth");
    }
    public function index()
    {
        ##consulta tabla entidad
        $entidadEmisoras = DB::table('entidad_emisora')->paginate(10);
        return view('entidad_emisoras.index')->with('entidadEmisoras', $entidadEmisoras);
    }


    public function create()
    {
        return view('entidad_emisoras.create');
    }


    public function show($entidad_id)
    {

        $entidadEmisoras = DB::table("entidad_emisora")->where("enti_cod", $entidad_id)->first();

        if (empty($entidadEmisoras)) {

            Flash::error("Registro no encontrado");

          return redirect(route("entidadEmisoras.index"));
        }

        return view("entidad_emisoras.show")->with("entidadEmisora", $entidadEmisoras);
    }


    public function store(Request $request)
    {
        $input = $request->all();

        ##grabar datos
        DB::insert("INSERT INTO entidad_emisora(enti_descri) values(?)", [$input['enti_descri']]);

        Flash::success("Registro guardado correctamente");

        return redirect(Route('entidadEmisoras.index'));
    }


    public function edit($entidad_id)
    {
        $entidadEmisoras = DB::select("SELECT * FROM entidad_emisora where enti_cod = ?", [$entidad_id]);

        if (empty($entidadEmisoras) == 0) {
            Flash::error("Registro no encontrado!");

            redirect(route('entidadEmisoras.index'));
        }
        return view('entidad_emisoras.edit')->with('entidadEmisora', $entidadEmisoras[0]);
    }


    public function update($entidad_id, Request $request)
    {
        $input = $request->all();
        $entidadEmisoras = DB::table('entidad_emisora')->where('enti_cod', $entidad_id)->first();

        if (empty($entidadEmisoras)) {
            Flash::error("Registro no encontrado");

            return redirect(route('entidadEmisoras.index'));
        }
        DB::update("UPDATE entidad_emisora set enti_descri = ? where enti_cod= ?", [$input['enti_descri'], $entidad_id]);

        Flash::success("Registro actualizado correctamente");

        return redirect(route('entidadEmisoras.index'));
    }


    public function destroy($entidad_id)
    {
        $entidadEmisoras = DB::select("SELECT * FROM entidad_emisora where enti_cod = ?", [$entidad_id]);

        if (empty($entidadEmisoras)) {
            Flash::error('registro no eliminado');

            return redirect(route('entidadEmisoras.index'));
        }

        ##borrar registro
        DB::delete("DELETE FROM entidad_emisora where enti_cod = ?", [$entidad_id]);


        Flash::success('Borrado con exito.');

        return redirect(route('entidadEmisoras.index'));
    }
}
