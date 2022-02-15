<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use App\Models\ExameneUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

/**
 * Class ExameneUserController
 * @package App\Http\Controllers
 */
class ExameneUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $exameneUsers = ExameneUser::paginate();
        $year = ['0','1','2','3','4','5','6','7','8','9','10','11','12','13','14','15','16','17','18','19','20'];
        $user = [];
        foreach ($year as $key => $value) {
            $user[] = ExameneUser::where('nota',$value)->count();
        }

        return view('examene-user.index', compact('exameneUsers'))
            ->with('i', (request()->input('page', 1) - 1) * $exameneUsers->perPage())
            ->with('year',json_encode($year,JSON_NUMERIC_CHECK))
            ->with('user',json_encode($user,JSON_NUMERIC_CHECK));
    }
    public function indexByCurso($idCurso)
    {
        $exameneUsersModel=ExameneUser::join('examenes','examenes.id','=','examene_users.examene_id')
        ->join('sesiones','examenes.sesione_id','=','sesiones.id')->where('sesiones.curso_id',$idCurso);
        $exameneUsers = $exameneUsersModel->paginate();
        $exameneUsersModel = $exameneUsersModel->get();
        $year = ['0','1','2','3','4','5','6','7','8','9','10','11','12','13','14','15','16','17','18','19','20'];
        $user = [];
        foreach ($year as $key => $value) {
            // $user[] = ExameneUser::where('nota',$value)->count();
            $user[] = $exameneUsersModel->filter(function ($modelo, $key) use ($value) {
                // return $value > 2;
                if($modelo['nota']==$value)return $modelo;

            })->count();
           
        }
        return view('examene-user.indexByCurso', compact('exameneUsers'))
            ->with('i', (request()->input('page', 1) - 1) * $exameneUsers->perPage())
            ->with('year',json_encode($year,JSON_NUMERIC_CHECK))
            ->with('user',json_encode($user,JSON_NUMERIC_CHECK));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $exameneUser = new ExameneUser();
        return view('examene-user.create', compact('exameneUser'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(ExameneUser::$rules);

        $exameneUser = ExameneUser::create($request->all());

        return redirect()->route('examene-users.index')
            ->with('success', 'ExameneUser created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $exameneUser = ExameneUser::find($id);

        return view('examene-user.show', compact('exameneUser'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $exameneUser = ExameneUser::find($id);

        return view('examene-user.edit', compact('exameneUser'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  ExameneUser $exameneUser
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ExameneUser $exameneUser)
    {
        // request()->validate(ExameneUser::$rules);
        if($request->file_profe){
            $nombre = 'examenes-resp-profe/' . $exameneUser->examene->sesione_id . '/' . $request->file_profe->getClientOriginalName();
            $file = $request->file('file_profe')->storeAs('public/files_sesiones', $nombre);
            $url = Storage::url($file);
            $request['url']= $url;
        }
        $exameneUser->update($request->all());

        return redirect()->route('examene-users.index')
            ->with('success', 'ExameneUser updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $exameneUser = ExameneUser::find($id)->delete();

        return redirect()->route('examene-users.index')
            ->with('success', 'ExameneUser deleted successfully');
    }
}
