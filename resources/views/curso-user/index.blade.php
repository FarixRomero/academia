{{-- @extends('layouts.app') --}}
@extends('adminlte::page')

@section('title', 'Horario')

@section('content_header')


@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Curso User') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('curso-users.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
                            <table class="table table-striped table-hover" id="cur_horario">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        
										<th>Curso Id</th>
										<th>User Id</th>
										<th>Fecha Inicio</th>
										<th>Is Active</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($cursoUsers as $cursoUser)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $cursoUser->curso->name }}</td>
											<td>{{ $cursoUser->user->name }}</td>
											<td>{{ $cursoUser->fecha_inicio }}</td>
											<td>{{ $cursoUser->is_active }}</td>

                                            <td>
                                                <form action="{{ route('curso-users.destroy',$cursoUser->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('curso-users.show',$cursoUser->id) }}"><i class="fa fa-fw fa-eye"></i> Show</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('curso-users.edit',$cursoUser->id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
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
                {!! $cursoUsers->links() !!}
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