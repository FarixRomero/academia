@extends('layouts.app')

@section('template_title')
    {{ $sesione->name ?? 'Show Sesione' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Sesione</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('sesiones.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Curso Horario Id:</strong>
                            {{ $sesione->curso_horario_id }}
                        </div>
                        <div class="form-group">
                            <strong>Titulo:</strong>
                            {{ $sesione->titulo }}
                        </div>
                        <div class="form-group">
                            <strong>Descripcion:</strong>
                            {{ $sesione->descripcion }}
                        </div>
                        <div class="form-group">
                            <strong>Is Active:</strong>
                            {{ $sesione->is_active }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
