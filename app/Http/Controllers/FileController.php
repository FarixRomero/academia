<?php

namespace App\Http\Controllers;

use App\Models\File;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
// use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;
/**
 * Class FileController
 * @package App\Http\Controllers
 */
class FileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $files = File::paginate();

        return view('file.index', compact('files'))
            ->with('i', (request()->input('page', 1) - 1) * $files->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $file = new File();
        return view('file.create', compact('file'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // request()->validate(File::$rules);

        // $file = File::create($request->all());
        // foreach ($request['files'] as $file) {
            $nombre = Str::random(10) . '-' . $request->file->getClientOriginalName();
            $file= $request->file('file')->storeAs('public/files_sesiones',$nombre);
            // $ruta = storage_path() . '\app\public\imagenes/' . $nombre;
            $url = Storage::url($file);
             File::create([
                // 'url' => '/storage/imagenes/' . $file->name,
                'url' =>  $url,
                'tipo' => 1,
            ]);
        // }

        // return redirect()->route('files.index')
        //     ->with('success', 'File created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $file = File::find($id);

        return view('file.show', compact('file'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $file = File::find($id);

        return view('file.edit', compact('file'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  File $file
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, File $file)
    {
        request()->validate(File::$rules);

        $file->update($request->all());

        return redirect()->route('files.index')
            ->with('success', 'File updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $file = File::find($id)->delete();

        return redirect()->route('files.index')
            ->with('success', 'File deleted successfully');
    }
}