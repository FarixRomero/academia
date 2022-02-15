<?php

namespace App\Http\Controllers;

use App\Models\Sesione;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

/**
 * Class SesioneController
 * @package App\Http\Controllers
 */
class SesioneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sesiones = Sesione::paginate();

        return view('sesione.index', compact('sesiones'))
            ->with('i', (request()->input('page', 1) - 1) * $sesiones->perPage());
    }
    public function detail()
    {
        $sesiones = Sesione::get();

        return view('sesione.detail', compact('sesiones'));
    }
    public function detailStudent($id)
    {
        $sesiones = Sesione::where('curso_id',$id)->get();

        return view('student.curso.detail', compact('sesiones'));
    }
    public function detailById($id)
    {
        $sesion = Sesione::find($id);

        return view('sesione.detailById', compact('sesion'));
    }
    public function detailByCurso($id)
    {
        $sesiones = Sesione::where('curso_id',$id)->get();

        return view('sesione.detail', compact('sesiones'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sesione = new Sesione();
        return view('sesione.create', compact('sesione'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // request()->validate(Sesione::$rules);
        // $request['descripcion'] = nl2br($request['descripcion']);
        // dd($request->toArray());
        $sesione = Sesione::create($request->all());
        Alert:: toast('Se Creo Correctamente!','success');

        return back();
        // return redirect()->route('sesiones.index')
        //     ->with('success', 'Sesione created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $sesione = Sesione::find($id);

        return view('sesione.show', compact('sesione'));
    }
    public function indexByCurso($id)
    {
        $curso_id= $id;
        $sesiones = Sesione::where('curso_id',$id)->paginate();
        return view('sesione.indexByCurso', compact('sesiones','curso_id'))
        ->with('i', (request()->input('page', 1) - 1) * $sesiones->perPage());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sesione = Sesione::find($id);

        return view('sesione.edit', compact('sesione'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Sesione $sesione
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sesione $sesione)
    {
        request()->validate(Sesione::$rules);

        $sesione->update($request->all());

        return redirect()->route('sesiones.index')
            ->with('success', 'Sesione updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $sesione = Sesione::find($id)->delete();
        return back();
        // return redirect()->route('sesiones.index')
        //     ->with('success', 'Sesione deleted successfully');
    }
}
