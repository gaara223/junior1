<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateEmpleadosRequest;
use App\Http\Requests\UpdateEmpleadosRequest;
use Illuminate\Http\Request;
use Flash;
use Response;
use App\Models\Empleados;

class EmpleadosController extends Controller
{

    /**
     * Display a listing of the Empleados.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $empleados = Empleados::paginate(10);

        $company_ids = [];
        foreach ($empleados as $key => $empleado) {
            $company_ids[] = $empleado->company_id;
        }

        $empresas = \App\Models\Empresas::whereIn('id',$company_ids)->pluck('name','id');

        return view('empleados.index')
            ->with(['empleados' => $empleados, 'empresas' => $empresas]);
    }

    /**
     * Show the form for creating a new Empleados.
     *
     * @return Response
     */
    public function create()
    {
        $empresas = \App\Models\Empresas::pluck('name','id');

        return view('empleados.create', compact('empresas'));
    }

    /**
     * Store a newly created Empleados in storage.
     *
     * @param CreateEmpleadosRequest $request
     *
     * @return Response
     */
    public function store(CreateEmpleadosRequest $request)
    {
        $input = $request->all();

        $empleados = Empleados::create($input);

        Flash::success('Empleado creado correctamente.');

        return redirect(route('empleados.index'));
    }

    /**
     * Display the specified Empleados.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $empleados = Empleados::find($id);

        if (empty($empleados)) {
            Flash::error('Empleado no encontrado');

            return redirect(route('empleados.index'));
        }

        $empleados->company_name = $empleados->company()->first()->name ?? '';

        return view('empleados.show')->with('empleados', $empleados);
    }

    /**
     * Show the form for editing the specified Empleados.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $empleados = Empleados::find($id);

        if (empty($empleados)) {
            Flash::error('Empleado no encontrado');

            return redirect(route('empleados.index'));
        }

        $empresas = \App\Models\Empresas::pluck('name','id');

        return view('empleados.edit')->with(['empleados' => $empleados, 'empresas' => $empresas]);
    }

    /**
     * Update the specified Empleados in storage.
     *
     * @param  int              $id
     * @param UpdateEmpleadosRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateEmpleadosRequest $request)
    {
        $empleados = Empleados::find($id);

        if (empty($empleados)) {
            Flash::error('Empleado no encontrado');

            return redirect(route('empleados.index'));
        }

        $empleados = Empleados::update($request->all(), $id);

        Flash::success('Empleado actualizado correctamente.');

        return redirect(route('empleados.index'));
    }

    /**
     * Remove the specified Empleados from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $empleados = Empleados::find($id);

        if (empty($empleados)) {
            Flash::error('Empleado no encontrado');

            return redirect(route('empleados.index'));
        }

        Empleados::delete($id);

        Flash::success('Empleado eliminado correctamente.');

        return redirect(route('empleados.index'));
    }
}
