<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateDepartamentoRequest;
use App\Http\Requests\UpdateDepartamentoRequest;
use App\Http\Controllers\AppBaseController;
use App\Repositories\DepartamentoRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Laracasts\Flash\Flash as FlashFlash;
use Symfony\Component\HttpFoundation\Session\Flash\FlashBag;
use Laracasts\Flash\Flash;

class DepartamentoController extends AppBaseController
{

    
    /** @var DepartamentoRepository $departamentoRepository*/
    private $departamentoRepository;

    public function __construct(DepartamentoRepository $departamentoRepo)
    {
        $this->departamentoRepository = $departamentoRepo;
    }

    /**
     * Display a listing of the Departamento.
     */

     
    public function index(Request $request)
    {
        ##listar datos 
        $departamentos = DB::table('departamento')->paginate(5);
        confirmDelete("Atencion", "Desea borrar el registro");

        return view('departamentos.index')
        -> with('departamentos', $departamentos);
    }

    /**
     * Show the form for creating a new Departamento.
     */
    public function create()
    {
        return view('departamentos.create');
    }

    /**
     * Store a newly created Departamento in storage.
     */
    public function store(Request $request)
    {
        $input = $request->all();

        $departamento = DB::insert("insert into departamento(dep_descripcion) values(?)", [$input['dep_descripcion']]);

        alert()->success('Title','Lorem Lorem Lorem'); 

        return redirect(route('departamentos.index'));
    }

    /**
     * Display the specified Departamento.
     */
    public function show($id_departamento)
    {
        $departamento = DB::table("departamento")->where("id_departamento", $id_departamento)->first();

        if (empty($departamento)) {
            Flash::error('Departamento not found');

            return redirect(route('departamentos.index'));
        }

        return view('departamentos.show')->with('departamento', $departamento);
    }

    /**
     * Show the form for editing the specified Departamento.
     */
    public function edit($Departramento_id)
    {
        $departamento = DB::select("SELECT * FROM departamento where id_departamento = ?", [$Departramento_id]);

        if (empty($departamento)) {
            Flash::error('Departamento not found');

            return redirect(route('departamentos.index'));
        }

        return view('departamentos.edit')->with('departamento', $departamento[0]);
    }

    /**
     * Update the specified Departamento in storage.
     */
    public function update($id_departamento,Request $request)
    {
        $departamento =  DB::select('SELECT * FROM departamento where id_departamento = ?', [$id_departamento]);

        $input = $request ->all();

        if (empty($departamento[0])) {
            Flash::error('Departamento no encontrado');

            return redirect(route('departamentos.index'));
        }

        $departamento = DB::update("update departamento set dep_descripcion = ? where id_departamento = ?", [$input["dep_descripcion"], $id_departamento]);

        Flash::success('Departamento updated successfully.');

        return redirect(route('departamentos.index'));
    }

    /**
     * Remove the specified Departamento from storage.
     *
     * @throws \Exception
     */
    public function destroy($departamento_id)
    {
        $departamento = DB::select("SELECT * FROM departamento where id_departamento = ?", [$departamento_id]);

        if (empty($departamento)) {
            Flash::error('Departamento not found');

            return redirect(route('departamentos.index'));
        }

        ##borrar registro
        DB::delete("DELETE FROM departamento where id_departamento = ?", [$departamento_id]);
    

        Flash::success('Borrado con exito.');

        return redirect(route('departamentos.index'));
    }
}
