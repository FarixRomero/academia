{{-- @extends('layouts.app') --}}
@extends('adminlte::page')

@section('title', 'Cursos')

@section('content_header')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Curso Horario') }}
                            </span>

                            <div class="float-right">
                                <a href="{{ route('curso-horarios.create') }}" class="btn btn-primary btn-sm float-right"
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
                            <table class="table table-striped table-hover"  id="cur_horario">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>

                                        <th>Curso Id</th>
                                        <th>Horario Id</th>
                                        <th>Name</th>
                                        <th>Is Active</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($cursoHorarios as $cursoHorario)
                                        <tr>
                                            <td>{{ ++$i }}</td>

                                            <td>{{ $cursoHorario->curso->name }}</td>
                                            <td>{{ $cursoHorario->horario->name }}</td>
                                            <td>{{ $cursoHorario->name }}</td>
                                            <td>{{ $cursoHorario->is_active }}</td>

                                            <td>
                                                <form action="{{ route('curso-horarios.destroy', $cursoHorario->id) }}"
                                                    method="POST">
                                                    <a class="btn btn-sm btn-primary "
                                                        href="{{ route('sesion.indexByCurso', $cursoHorario->id) }}"><i
                                                            class="fa fa-fw fa-book"></i> Sesiones</a>
                                                    <a class="btn btn-sm btn-secondary "
                                                        href="{{ route('sesion.detailByCurso', $cursoHorario->id) }}"><i
                                                            class="fa fa-fw fa-book"></i> Ver</a>
                                                    <a class="btn btn-sm btn-success"
                                                        href="{{ route('curso-horarios.edit', $cursoHorario->id) }}"><i
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
                {!! $cursoHorarios->links() !!}
            </div>
        </div>
    </div>
@endsection
@section('js')
<script>
    $(document).ready(function() {
        $('#cur_horario').DataTable({
            "language": {
                "url": "https://cdn.datatables.net/plug-ins/1.11.3/i18n/es_es.json"
            }
        });
    });
</script>
@endsection
