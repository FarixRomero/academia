<?php

namespace App\Http\Controllers;

use App\Models\Examene;
use App\Models\ExameneUser;
use App\Models\Sesione;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;
/**
 * Class ExameneController
 * @package App\Http\Controllers
 */
class ExameneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $examenes = Examene::paginate();

        return view('examene.index', compact('examenes'))
            ->with('i', (request()->input('page', 1) - 1) * $examenes->perPage());
    }
    public function indexBySesion($idCursoHorario,$id)
    {
        $examenes = Examene::where('sesione_id',$id)->paginate();
        return view('examene.index', compact('examenes'))
            ->with('i', (request()->input('page', 1) - 1) * $examenes->perPage());
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $examene = new Examene();
        return view('examene.create', compact('examene'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // request()->validate(Examene::$rules);
        
        $sesion = Sesione::find( $request->sesion_id);
        $usuarios= $sesion->curso->users->pluck('id');
        $nombre = 'examenes/' . $request->sesion_id . '/' . Str::random(10) . '-' . $request->file->getClientOriginalName();
        $file = $request->file('file')->storeAs('public/files_sesiones', $nombre);
        $url = Storage::url($file);
        $hora_inicio=$request->hora_inicio;
        $hora_fin=new Carbon($hora_inicio);
        $hora_fin = $hora_fin->addMinutes($request->duracion);
        // dd($hora_fin);
        $examen = Examene::create([
            'url' =>  $url,
            'sesione_id' =>  $request->sesion_id,
            'hora_inicio' => $hora_inicio,
            'hora_fin' => $hora_fin,
            'duracion' => $request->duracion,
            'titulo' => $request->titulo,
            'descripcion' => $request->descripcion,
            'sesione_id' => $request->sesion_id
        ]);
   
        $examen->users()->attach($usuarios);

        Alert::toast('Se creo correctamente','success');
        return back();
    }
    public function updateStudent(Request $request,$id)
    {
        // request()->validate(Examene::$rules);
        // dd($request->toArray());
        if($request->file_student){
            $examenStudent = ExameneUser::find($id);
            $nombre = 'examenes-resp-alumno/' . $examenStudent->examene->sesione_id . '/' . $request->file_student->getClientOriginalName();
            $file = $request->file('file_student')->storeAs('public/files_sesiones', $nombre);
            $url = Storage::url($file);
        }
        $resp=[];
        if($request->file_student)$resp['url_student']=$url;
        if($request->comentario_student)$resp['comentario_student']=$request->comentario_student;
        $examenStudent->update( $resp);
        Alert::toast('Se creo correctamente','success');
        return back();
        // dd($hora_fin);
    }


    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $examene = Examene::find($id);

        return view('examene.show', compact('examene'));
    }
    public function showStudent($idCurso,$idExam)
    {
        $user_id=Auth::user()->id;
        $examene = Examene::find($idExam);
        $examenUser = ExameneUser::where('examene_id',$idExam)->where('user_id', $user_id)->first();
        $date= new Carbon($examene->hora_fin);
        $diff = Carbon::now()->diffInSeconds($examene->hora_fin, false);
        // $diff = $date->diffInMinutes($now);
        return view('student.examen.show', compact('examene','examenUser','diff'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $examene = Examene::find($id);

        return view('examene.edit', compact('examene'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Examene $examene
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Examene $examene)
    {
        request()->validate(Examene::$rules);

        $examene->update($request->all());

        return redirect()->route('examenes.index')
            ->with('success', 'Examene updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $examene = Examene::find($id)->delete();

        return redirect()->route('examenes.index')
            ->with('success', 'Examene deleted successfully');
    }
}
