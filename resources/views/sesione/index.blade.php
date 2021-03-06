{{-- @extends('layouts.app') --}}
@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Sesiones</h1>
@stop

@section('content')
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
                                                    <a class="btn btn-sm btn-primary " href="{{ route('sesiones.show',$sesione->id) }}"><i class="fa fa-fw fa-eye"></i> Show</a>
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
