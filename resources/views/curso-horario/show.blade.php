{{-- @extends('layouts.app') --}}
@extends('adminlte::page')

@section('title', 'Cursos')

@section('content_header')

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Curso Horario</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('curso-horarios.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Curso Id:</strong>
                            {{ $cursoHorario->curso_id }}
                        </div>
                        <div class="form-group">
                            <strong>Horario Id:</strong>
                            {{ $cursoHorario->horario_id }}
                        </div>
                        <div class="form-group">
                            <strong>Name:</strong>
                            {{ $cursoHorario->name }}
                        </div>
                        <div class="form-group">
                            <strong>Is Active:</strong>
                            {{ $cursoHorario->is_active }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
