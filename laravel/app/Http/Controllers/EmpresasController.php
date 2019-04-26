<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateEmpresasRequest;
use App\Http\Requests\CreateEmpresasRequest;
use Illuminate\Support\Facades\Validator;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Http\Request;
use Flash;
use Response;
use App\Models\Empresas;

class EmpresasController extends Controller
{

    /**
     * Display a listing of the Empresas.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $empresas = Empresas::paginate(10);

        return view('empresas.index')
            ->with('empresas', $empresas);
    }

    /**
     * Show the form for creating a new Empresas.
     *
     * @return Response
     */
    public function create()
    {
        return view('empresas.create');
    }

    /**
     * Store a newly created Empresas in storage.
     *
     * @param CreateEmpresasRequest $request
     *
     * @return Response
     */
    public function store(CreateEmpresasRequest $request)
    {
        $input = $request->all();

        $empresas = Empresas::create($input);

        //guarda el logo
        if ($request->file('logo')) {
            $success = Storage::cleanDirectory($directory);

            $nArchivo = $request->file('logo')->getClientOriginalName();
            $filename = md5($nArchivo).'.'.$request->file('logo')->getClientOriginalExtension();

            $request->file('logo')->storeAs('public/empresas/'.$empresas->id, $filename);
            
            $empresas->fill(['logo'=>$filename])->save();
        }


        Flash::success('Empresa creada correctamente.');

        return redirect(route('empresas.index'));
    }

    /**
     * Display the specified Empresas.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $empresas = Empresas::find($id);

        if (empty($empresas)) {
            Flash::error('Empresa no encontrada');

            return redirect(route('empresas.index'));
        }

        $empresas->logo_url = url("storage/empresas/".$empresas->id."/".$empresas->logo);

        return view('empresas.show', compact('empresas'));
    }

    /**
     * Show the form for editing the specified Empresas.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $empresas = Empresas::find($id);

        if (empty($empresas)) {
            Flash::error('Empresa no encontrada');

            return redirect(route('empresas.index'));
        }

        return view('empresas.edit')->with('empresas', $empresas);
    }

    /**
     * Update the specified Empresas in storage.
     *
     * @param  int              $id
     * @param UpdateEmpresasRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateEmpresasRequest $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'email|max:191|unique:empresas,email,' . $id
        ]);
        
        if ($validator->fails()) {
            return redirect(route('empresas.edit',['id' => $id]))
                ->withInput($request->input())
                ->withErrors($validator);
        }

        $empresas = Empresas::find($id);

        if (empty($empresas)) {
            Flash::error('Empresa no encontrada');

            return redirect(route('empresas.index'));
        }

        $input = $request->all();

        //guarda el logo
        if ($request->file('logo')) {

            // limpia el directorio, elimina los archivos
            $dir_path = storage_path()."/app/public/empresas/".$empresas->id;
            $fs = new Filesystem();
            $fs->cleanDirectory($dir_path);
            
            // obtiene los datos del archivo y encripta el nombre para no tener errores de lectura
            $nArchivo = $request->file('logo')->getClientOriginalName();
            $filename = md5($nArchivo).'.'.$request->file('logo')->getClientOriginalExtension();

            $request->file('logo')->storeAs('public/empresas/'.$empresas->id, $filename);
            
            $input['logo'] = $filename;
        }

        $empresas = $empresas->update($input);

        Flash::success('Empresa actualizada correctamente.');

        return redirect(route('empresas.index'));
    }

    /**
     * Remove the specified Empresas from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $empresas = Empresas::find($id);

        if (empty($empresas)) {
            Flash::error('Empresa no encontrada');

            return redirect(route('empresas.index'));
        }

        $empresas->delete($id);

        Flash::success('Empresa eliminada correctamente.');

        return redirect(route('empresas.index'));
    }
}
