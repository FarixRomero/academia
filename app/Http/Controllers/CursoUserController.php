<?php

namespace App\Http\Controllers;

use App\Models\CursoUser;
use App\Models\User;
use App\Models\Curso;
use Illuminate\Http\Request;

/**
 * Class CursoUserController
 * @package App\Http\Controllers
 */
class CursoUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cursoUsers = CursoUser::paginate();

        return view('curso-user.index', compact('cursoUsers'))
            ->with('i', (request()->input('page', 1) - 1) * $cursoUsers->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cursoUser = new CursoUser();
        $cursos=  Curso::orderByDesc('created_at')->get()   ;
        $usuarios=  User::orderByDesc('created_at')->get();
        return view('curso-user.create', compact('cursoUser','cursos','usuarios'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(CursoUser::$rules);

        $cursoUser = CursoUser::create($request->all());

        return redirect()->route('curso-users.index')
            ->with('success', 'CursoUser created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cursoUser = CursoUser::find($id);

        return view('curso-user.show', compact('cursoUser'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cursoUser = CursoUser::find($id);
        $cursos=  Curso::orderByDesc('created_at')->get()   ;
        $usuarios=  User::orderByDesc('created_at')->get();
        return view('curso-user.edit', compact('cursoUser','cursos','usuarios'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  CursoUser $cursoUser
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CursoUser $cursoUser)
    {
        request()->validate(CursoUser::$rules);

        $cursoUser->update($request->all());

        return redirect()->route('curso-users.index')
            ->with('success', 'CursoUser updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $cursoUser = CursoUser::find($id)->delete();

        return redirect()->route('curso-users.index')
            ->with('success', 'CursoUser deleted successfully');
    }
}
