<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Laracasts\Flash\Flash;

class ClienteController extends AppBaseController
{

    public function __construct()
    {
        $this->middleware("auth");
    }
    
    public function index()
    {
        ##consulta tabla clientes
        $clientes = DB::table('clientes')->select(
            "clientes.*",
            "departamento.dep_descripcion",
            "ciudad.ciu_descripcion"
        )
            ->leftJoin("departamento", "departamento.id_departamento", "clientes.id_departamento")
            ->leftJoin("ciudad", "ciudad.id_ciudad", "clientes.id_ciudad")
            ->paginate(10);

        return view("clientes.index")->with("clientes", $clientes);
    }


    public function create()
    {
        $departamento = DB::table("departamento")->pluck("dep_descripcion", "id_departamento");

        $ciudad = DB::table("ciudad")->pluck("ciu_descripcion", "id_ciudad");

        $genero = ["M" => "MASCULINO", "F" => "FEMENINO"];

        return view("clientes.create")
            ->with("ciudad", $ciudad)
            ->with("departamento", $departamento)
            ->with("genero", $genero);
    }




    public function store(Request $request)
    {

        $input = $request->all();

        // Define las reglas de validación para el campo cli_ci
        $rules = [
            'id_ciudad' => 'required',
            'id_departamento' => 'required',
            'cli_ci' => 'required|unique:clientes', // La regla 'unique' verifica que el valor no esté duplicado en la tabla 'clientes'
            'cli_nombre' => 'required',
            'cli_apellido' => 'required',
            'cli_sexo' => 'required',
            'cli_fnac' => 'required',
            'cli_direccion' => 'required',
            'cli_telefono' => 'required|unique:clientes',
        ];

        // Define los mensajes de error personalizados
        $messages = [
            'cli_ci.unique' => 'El número de cédula ya está en uso.',
            'cli_telefono.unique' => 'El número de telefono ya está en uso.',
        ];

        // Realiza la validación
        $validator = Validator::make($input, $rules, $messages);

        if ($validator->fails()) {
            return redirect('clientes/create')
                ->withErrors($validator)
                ->withInput();
        }

        // Si pasa la validación, procede a guardar los datos
        DB::insert("INSERT INTO clientes(id_ciudad,id_departamento,cli_ci,cli_nombre,cli_apellido,cli_sexo,cli_fnac,cli_direccion,cli_telefono) values(?,?,?,?,?,?,?,?,?)", [
            $input['id_ciudad'],
            $input['id_departamento'],
            $input['cli_ci'],
            $input['cli_nombre'],
            $input['cli_apellido'],
            $input['cli_sexo'],
            $input['cli_fnac'],
            $input['cli_direccion'],
            $input['cli_telefono']
        ]);

        Flash::success("Registro guardado correctamente");

        return redirect(Route('clientes.index'));
    }


    public function edit($id_clientes)
    {
        $clientes = DB::table('clientes')->where('id_cliente', $id_clientes)->first();
        $departamento = DB::table("departamento")->pluck("dep_descripcion", "id_departamento");
        $ciudad = DB::table("ciudad")->pluck("ciu_descripcion", "id_ciudad");
        $genero = ["M" => "MASCULINO", "F" => "FEMENINO"];

        if (empty($clientes)) {
            Flash::error("Cliente no encontrado");
            return redirect(route('clientes.index'));
        }

        return view('clientes.edit')
            ->with("cliente", $clientes)
            ->with("ciudad", $ciudad)
            ->with("departamento", $departamento)
            ->with("genero", $genero);
    }

    public function update($id_clientes, Request $request)
    {
        $input = $request->all();

        $cliente = DB::table('clientes')->where('id_cliente', $id_clientes)->first();

        if (empty($cliente)) {
            Flash::error("Cliente no encontrado");
            return redirect(route('clientes.index'));
        }

        // Define las reglas de validación
        $rules = [
            'id_ciudad' => 'required',
            'id_departamento' => 'required',
            'cli_ci' => 'required|unique:clientes,cli_ci,' . $cliente->id_cliente . ',id_cliente',
            'cli_nombre' => 'required',
            'cli_apellido' => 'required',
            'cli_sexo' => 'required',
            'cli_fnac' => 'required',
            'cli_direccion' => 'required',
            'cli_telefono' => 'required|unique:clientes,cli_telefono,' . $cliente->id_cliente . ',id_cliente',
        ];

        // Define mensajes personalizados para las reglas de validación si es necesario
        $messages = [
            'cli_ci.unique' => 'La cédula ya está en uso por otro cliente.',
            'cli_telefono.unique' => 'El numero de telefono ya está en uso por otro cliente.',
        ];

        // Realiza la validación
        $validator = Validator::make($input, $rules, $messages);

        if ($validator->fails()) {
            return redirect('clientes/' . $id_clientes . '/edit')
                ->withErrors($validator)
                ->withInput();
        }

        // Aplica la lógica de actualización en la base de datos
        DB::table('clientes')
            ->where('id_cliente', $id_clientes)
            ->update([
                "id_ciudad" => $input['id_ciudad'],
                "id_departamento" => $input['id_departamento'],
                "cli_ci" => $input['cli_ci'],
                "cli_nombre" => $input['cli_nombre'],
                "cli_apellido" => $input['cli_apellido'],
                "cli_sexo" => $input['cli_sexo'],
                "cli_fnac" => $input['cli_fnac'],
                "cli_direccion" => $input['cli_direccion'],
                "cli_telefono" => $input['cli_telefono'],
            ]);

        Flash::success("Cliente actualizado correctamente");

        return redirect(route('clientes.index'));
    }


    public function destroy($id_clientes)
    {
        $clientes = DB::select("SELECT * FROM clientes where id_cliente = ?", [$id_clientes]);

        if (empty($clientes)) {
            Flash::error('registro no eliminado');

            return redirect(route('clientes.index'));
        }

        ##borrar registro
        DB::delete("DELETE FROM clientes where id_cliente = ?", [$id_clientes]);


        Flash::success('Borrado con exito.');

        return redirect(route('clientes.index'));
    }
}
