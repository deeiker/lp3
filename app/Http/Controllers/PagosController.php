<?php

namespace App\Http\Controllers;

use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Laracasts\Flash\Flash;

class PagosController extends AppbaseController
{

    public function __construct()
    {
        $this->middleware("auth");
    }
    public function index()
    {
        ##consulta tabla marcas
        $formapago = DB::table('forma_pagos')->paginate(10);
        confirmDelete("Atencion", "Desea borrar el registro");
        return view('Formapagos.index')->with('formapagos', $formapago);
    }


    public function create()
    {
        return view('Formapagos.create');
    }


    public function show($id_forma)
    {

        $formapago = DB::table("forma_pagos")->where("id_forma", $id_forma)->first();

        if (empty($formapago)) {

            Flash::error("Registro no encontrado");

          return redirect(route("Formapagos.index"));
        }

        return view("Formapagos.show")->with("formapagos", $formapago);
    }


    public function store(Request $request)
    {
        $input = $request->all();

        ##grabar datos
        DB::insert("INSERT INTO forma_pagos(descripcion) values(?)", [$input['descripcion']]);

        alert()->success('Title','Lorem Lorem Lorem'); 

        return redirect(Route('Formapagos.index'));
    }


    public function edit($id_forma)
    {
        $formapago = DB::select("SELECT * FROM forma_pagos where id_forma = ?", [$id_forma]);

        if (empty($formapago) == 0) {
            Flash::error("Registro no encontrado!");

            redirect(route('Formapagos.index'));
        }
        return view('Formapagos.edit')->with('formapagos', $formapago[0]);
    }


    public function update($id_forma, Request $request)
    {
        $input = $request->all();
        $formapago = DB::table("forma_pagos")->where("id_forma", $id_forma)->first();
    
        if (empty($formapago)) {
            Flash::error("Registro no encontrado");
            return redirect(route('Formapagos.index'));
        }
    
        // Utiliza el método update para actualizar el registro en la base de datos
        DB::update("UPDATE forma_pagos set descripcion = ? where id_forma= ?", [$input['descripcion'], $id_forma]);
    
        Flash::success("Registro actualizado correctamente");
    
        return redirect(route('Formapagos.index'));
    }
    


    public function destroy($id_forma)
    {
        $formapago = DB::select("SELECT * FROM forma_pagos where id_forma = ?", [$id_forma]);

        if (empty($formapago)) {
            Flash::error('registro no eliminado');

            return redirect(route('Formapagos.index'));
        }

        ##borrar registro
        DB::delete("DELETE FROM forma_pagos where id_forma = ?", [$id_forma]);


        Flash::success('Borrado con exito.');
        

        return redirect(route('Formapagos.index'));
    }
}
