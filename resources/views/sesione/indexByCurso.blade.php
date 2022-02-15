{{-- @extends('layouts.app') --}}
@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
@stop

@section('content')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('cursos.index') }}">Cursos</a></li>
        <li class="breadcrumb-item active">Sesiones</li>
    </ol>
</nav>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6"> 
                @include('sesione.formv2')
            </div>
            <div class="col-sm-6">
                <div class="card card-secondary">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                Administrar Sesiones
                            </span>

                             <div class="float-right">
                                <a href="{{ route('sesiones.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
                                        
										<th>Curso Horario Id</th>
										<th>Titulo</th>
										<th>Descripcion</th>
										<th>Is Active</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($sesiones as $sesione)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $sesione->curso_id }}</td>
											<td>{{ $sesione->titulo }}</td>
											<td>{{ $sesione->descripcion }}</td>
											<td>{{ $sesione->is_active }}</td>
                                            <td>
                                                <form action="{{ route('sesiones.destroy',$sesione->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('sesiones.detailById',$sesione->id) }}"><i class="fa fa-fw fa-eye"></i> Show</a>
                                                    <a class="btn btn-sm btn-secondary" href="{{ route('file.indexBySesion',[request()->route('id'),$sesione->id]) }}"><i class="fa fa-fw fa-file"></i>Archivos</a>
                                                    <a class="btn btn-sm btn-info" href="{{ route('examenes.indexBySesion',[request()->route('id'),$sesione->id]) }}"><i class="fa fa-fw fa-file"></i>Examenes</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('sesiones.edit',$sesione->id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $sesiones->links() !!}
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