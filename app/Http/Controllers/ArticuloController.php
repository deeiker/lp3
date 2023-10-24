<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Laracasts\Flash\Flash;

class ArticuloController extends AppBaseController
{

    public function __construct()
    {
        $this->middleware("auth");
    }
   

    public function index()
    {
        ##consulta tabla entidad
        $articulos = DB::table('articulos')->select(
            "articulos.*",
            "marcas.mar_descrip"
        )
        ->leftJoin("marcas", "marcas.mar_cod", "articulos.mar_cod")
        ->paginate(10);

        return view('articulos.index')->with('articulos', $articulos);
    }


    public function create()
    {
        return view('articulos.create');
    }


    public function show($id_articulos)
    {

        $articulos = DB::table("articulos")->where("id_articulo", $id_articulos)->first();

        if (empty($articulos)) {

            Flash::error("Registro no encontrado");

          return redirect(route("articulos.index"));
        }

        return view("articulos.show")->with("articulos", $articulos);
    }


    public function store(Request $request)
    {
        $input = $request->all();

        ##grabar datos
        DB::insert("INSERT INTO articulos(mar_cod,art_descripcion,art_precio,art_imagen,art_iva) values(?,?,?,?,?)", [
            $input['mar_cod'],
            $input['art_descripcion'],
            $input['art_precio'],
            $input['art_imagen'],
            $input['art_iva']
        ]);

        Flash::success("Registro guardado correctamente");

        return redirect(Route('articulos.index'));
    }


    public function edit($id_articulos)
    {
        $articulos = DB::select("SELECT * FROM articulos where id_articulo = ?", [$id_articulos]);

        if (empty($articulos) == 0) {
            Flash::error("Registro no encontrado!");

            redirect(route('articulos.index'));
        }
        return view('articulos.edit')->with('articulos', $articulos[0]);
    }


    public function update($id_articulos, Request $request)
{
    $input = $request->all();
    $articulo = DB::table('articulos')->where('id_articulo', $id_articulos)->first();

    if (empty($articulo)) {
        Flash::error("Registro no encontrado");
        return redirect(route('articulos.index'));
    }

    // Utiliza el método update para actualizar múltiples columnas
    DB::table('articulos')
        ->where('id_articulo', $id_articulos)
        ->update([
            'art_descripcion' => $input['art_descripcion'],
            'art_precio' => $input['art_precio'],
            'art_imagen' => $input['art_imagen'],
            'art_iva' => $input['art_iva'],
        ]);

    Flash::success("Registro actualizado correctamente");

    return redirect(route('articulos.index'));
}



    public function destroy($id_articulos)
    {
        $articulos = DB::select("SELECT * FROM articulos where id_articulo = ?", [$id_articulos]);

        if (empty($articulos)) {
            Flash::error('registro no eliminado');

            return redirect(route('articulos.index'));
        }

        ##borrar registro
        DB::delete("DELETE FROM articulos where id_articulo = ?", [$id_articulos]);


        Flash::success('Borrado con exito.');

        return redirect(route('articulos.index'));
    }
}
