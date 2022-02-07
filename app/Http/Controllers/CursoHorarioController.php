<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use App\Models\CursoHorario;
use App\Models\Horario;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
/**
 * Class CursoHorarioController
 * @package App\Http\Controllers
 */
class CursoHorarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cursoHorarios = CursoHorario::paginate();

        return view('curso-horario.index', compact('cursoHorarios'))
            ->with('i', (request()->input('page', 1) - 1) * $cursoHorarios->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cursoHorario = new CursoHorario();
        $cursos=  Curso::orderByDesc('created_at')->get()   ;
        $horarios=  Horario::orderByDesc('created_at')->get();

        return view('curso-horario.create', compact('cursoHorario','cursos','horarios'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(CursoHorario::$rules);
        $data=$request->all();
        if($data['is_active']) $data['is_active']=true;
        $cursoHorario = CursoHorario::create($data);

        Alert::success( 'Se creo exitosamente.');
        return redirect()->route('curso-horarios.index')
            ->with('success', 'CursoHorario created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cursoHorario = CursoHorario::find($id);

        return view('curso-horario.show', compact('cursoHorario'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cursoHorario = CursoHorario::find($id);
        $cursos=  Curso::orderByDesc('created_at')->get()   ;
        $horarios=  Horario::orderByDesc('created_at')->get();
        return view('curso-horario.edit', compact('cursoHorario','cursos','horarios'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  CursoHorario $cursoHorario
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CursoHorario $cursoHorario)
    {
        request()->validate(CursoHorario::$rules);

        $cursoHorario->update($request->all());

        return redirect()->route('curso-horarios.index')
            ->with('success', 'CursoHorario updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $cursoHorario = CursoHorario::find($id)->delete();

        return redirect()->route('curso-horarios.index')
            ->with('success', 'CursoHorario deleted successfully');
    }
}
