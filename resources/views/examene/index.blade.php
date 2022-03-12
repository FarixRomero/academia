{{-- @extends('layouts.app') --}}
@extends('adminlte::page')

@section('title', 'Horario')

@section('content_header')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                @include('examene.formIndex')
            </div>
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Examene') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('examenes.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
										<th>Titulo</th>
										<th>Descripcion</th>
										<th>Is Active</th>
										<th>Hora Inicio</th>
										<th>Duracion</th>
										<th>Hora Fin</th>
										<th>Url</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($examenes as $examene)
                                        <tr>
                                            <td>{{ ++$i }}</td>
											<td>{{ $examene->titulo }}</td>
											<td>{{ $examene->descripcion }}</td>
											<td>{{ $examene->is_active }}</td>
											<td>{{ $examene->hora_inicio }}</td>
											<td>{{ $examene->duracion }}</td>
											<td>{{ $examene->hora_fin }}</td>
											<td><a href="{{asset($examene->url)  }}">{{asset($examene->url)  }}</a> </td>

                                            <td>
                                                <form action="{{ route('examenes.destroy',$examene->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('examenes.show',$examene->id) }}"><i class="fa fa-fw fa-eye"></i> Show</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('examenes.edit',$examene->id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
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
                {!! $examenes->links() !!}
            </div>
        </div>
    </div>
@endsection
