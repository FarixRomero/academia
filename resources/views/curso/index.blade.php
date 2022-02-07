{{-- @extends('layouts.app') --}}
@extends('adminlte::page')

@section('title', 'Cursos')

@section('content_header')
@stop
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Curso') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('cursos.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
                            <table class="table table-striped table-hover "  id="cursos_table">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        
										<th>Name</th>
										<th>Nivel</th>
										<th>Code</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($cursos as $curso)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $curso->name }}</td>
											<td>{{ $curso->nivel }}</td>
											<td>{{ $curso->code }}</td>

                                            <td>
                                                <form action="{{ route('cursos.destroy',$curso->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('cursos.show',$curso->id) }}"><i class="fa fa-fw fa-eye"></i> Show</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('cursos.edit',$curso->id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
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
                {!! $cursos->links() !!}
            </div>
        </div>
    </div>
@endsection


@section('js')
   
    <script>
      $(document).ready(function() {
          $('#cursos_table').DataTable({
              "language": {
                  "url": "https://cdn.datatables.net/plug-ins/1.11.3/i18n/es_es.json"
              }
          });
      });
  </script>
@stop