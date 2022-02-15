{{-- @extends('layouts.app') --}}
@extends('adminlte::page')

@section('title', 'Horario')

@section('content_header')
@stop
@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('cursos.index') }}">Cursos</a></li>
            <li class="breadcrumb-item"><a
                    href="{{ route('sesion.indexByCurso', request()->route('idCursoHorario')) }}">Sesiones</a></li>
            <li class="breadcrumb-item active" aria-current="page">Archivos</li>
        </ol>
    </nav>
    <div class="container-fluid">

        <div class="row">
            <div class="col-sm-6">
                @include('file.formIndex')
            </div>
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('File') }}
                            </span>

                            <div class="float-right">
                                <a href="{{ route('files.create') }}" class="btn btn-primary btn-sm float-right"
                                    data-placement="left">
                                    {{ __('Create New') }}
                                </a>
                            </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>

                                        <th>Sesione Id</th>
                                        <th>Tipo File</th>
                                        <th>Orden</th>
                                        <th>Titulo</th>
                                        <th>Descripcion</th>
                                        <th>Url</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($files as $file)
                                        <tr>
                                            <td>{{ ++$i }}</td>

                                            <td>{{ $file->sesione_id }}</td>
                                            <td>{{ $file->tipo_file }}</td>
                                            <td>{{ $file->orden }}</td>
                                            <td>{{ $file->titulo }}</td>
                                            <td>{{ $file->descripcion }}</td>
                                            <td>{{ $file->url }}</td>

                                            <td>
                                                <form action="{{ route('files.destroy', $file->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary "
                                                        href="{{ route('files.show', $file->id) }}"><i
                                                            class="fa fa-fw fa-eye"></i> Show</a>
                                                    <a class="btn btn-sm btn-success"
                                                        href="{{ route('files.edit', $file->id) }}"><i
                                                            class="fa fa-fw fa-edit"></i> Edit</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i
                                                            class="fa fa-fw fa-trash"></i> Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $files->links() !!}
            </div>
        </div>
    </div>
@endsection
@section('css')
    <style>
        .breadcrumb {
            margin-bottom: 0;
            background-color: #F4F6F9;
        }

    </style>
@endsection
