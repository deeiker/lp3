<?php

namespace App\Http\Controllers;

use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Laracasts\Flash\Flash;

class SucursalController extends Controller
{

    public function __construct()
    {
        $this->middleware("auth");
    }
    public function index()
    {
        $sucursales = DB::table('sucursal')->paginate(10);

        return view('sucursals.index')->with('sucursal', $sucursales);
    }

    public function create()
    {
        return view('sucursals.create');
    }

    public function show($cod_suc)
    {
        $sucursales = DB::table("sucursal")->where("cod_suc", $cod_suc)->first();

        if (empty($sucursales)) {
            return redirect()->route("sucursals.index")->with('error', 'Registro no encontrado');
        }

        return view('sucursals.show')->with('sucursal', $sucursales);
    }

    public function store(Request $request)
    {
        $input = $request->all();
        DB::insert("INSERT INTO sucursal(suc_descri,suc_direccion,suc_telefono) values(?,?,?)", [
            $input['suc_descri'],
            $input['suc_direccion'],
            $input['suc_telefono'],
        ]);
        alert()->success('Title','Guaordado con exito');
        return redirect()->route('sucursal.index')->with('sucursal', 'Registro guardado correctamente');
    }

    public function edit($cod_suc)
    {
        $sucursales = DB::select("SELECT * FROM sucursal where cod_suc = ?", [$cod_suc]);

        if (empty($sucursales)) {
            Flash::error("Registro no encontrado!");

            redirect(route('sucursal.index'));
        }
        return view('sucursals.edit')->with('sucursal', $sucursales[0]);
    }

    public function update(Request $request, $cod_suc)
    {
        $input = $request->all();
        $sucursales = DB::table('sucursal')->where('cod_suc', $cod_suc)->first();

        if (empty($sucursales)) {
            return redirect()->route('sucursal.index')->with('sucursal', 'Registro no encontrado');
        }

        DB::table('sucursal')->where('cod_suc', $cod_suc)->update([
            'suc_descri' => $input['suc_descri'],
            'suc_direccion' => $input['suc_direccion'],
            'suc_telefono' => $input['suc_telefono']
        ]);

        return redirect()->route('sucursal.index')->with('sucursal', 'Registro actualizado correctamente');
    }

    public function destroy($cod_suc)
    {

        
        $sucursales = DB::table('sucursal')->where('cod_suc', $cod_suc)->first();

        if (empty($sucursales)) {
            return redirect()->route('sucursal.index')->with('sucursal', 'Registro no encontrado');
        }

       
        DB::table('sucursal')->where('cod_suc', $cod_suc)->delete();
        
        Alert::confirmDelete("Confirmación", "¿Estás seguro de que deseas eliminar este registro?")->autoclose(3000);

        return redirect()->route('sucursal.index')->with('sucursal', 'Registro eliminado con éxito');
    }
}
