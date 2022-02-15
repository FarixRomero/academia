@extends('layouts.app')

@section('template_title')
    {{ $cursoUser->name ?? 'Show Curso User' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Curso User</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('curso-users.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Curso Id:</strong>
                            {{ $cursoUser->curso_id }}
                        </div>
                        <div class="form-group">
                            <strong>User Id:</strong>
                            {{ $cursoUser->user_id }}
                        </div>
                        <div class="form-group">
                            <strong>Fecha Inicio:</strong>
                            {{ $cursoUser->fecha_inicio }}
                        </div>
                        <div class="form-group">
                            <strong>Is Active:</strong>
                            {{ $cursoUser->is_active }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
