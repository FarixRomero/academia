@extends('layouts.app')

@section('template_title')
    {{ $curso->name ?? 'Show Curso' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Curso</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('cursos.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Name:</strong>
                            {{ $curso->name }}
                        </div>
                        <div class="form-group">
                            <strong>Nivel:</strong>
                            {{ $curso->nivel }}
                        </div>
                        <div class="form-group">
                            <strong>Code:</strong>
                            {{ $curso->code }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
