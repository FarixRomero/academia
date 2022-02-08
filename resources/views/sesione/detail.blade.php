{{-- @extends('layouts.app') --}}
@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
@stop

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('curso-horarios.index') }}">Cursos</a></li>
            <li class="breadcrumb-item active">Sesiones</li>
        </ol>
    </nav>
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12 p-1">

                @foreach ($sesiones as $sesion)
                    @if ($sesion->is_active)
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">{{ $sesion->titulo }}</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                            class="fas fa-minus"></i>
                                    </button>
                                </div>

                            </div>
                            <div class="card-body" style="display: block;">
                                <p> {!! nl2br(e($sesion->descripcion)) !!}</p>
                                @if ($sesion->files->first())
                                    <hr>
                                    <h5>Materiales de la Sesión</h5>

                                    <div class="row">
                                        @foreach ($sesion->files as $file)
                                            @if ($file->tipo_file == 1)
                                                <div class="col-md-4">
                                                    <a href=" {{ asset($file->url) }}" download>
                                                        <div class="info-box bg-blue-grey">
                                                            <span class="info-box-icon bg-info elevation-1">
                                                                <i class="fa fa-file-pdf fa"></i>
                                                            </span>
                                                            <div class="info-box-content">
                                                                <span class="info-box-text"> {{ $file->titulo }}</span>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                            @endif
                                        @endforeach
                                    </div>
                                @endif
                            </div>

                        </div>
                    @endif
                @endforeach
            </div>
        </div>
        </div>
    </section>
@endsection
@section('css')
    <style>
        .breadcrumb {
            margin-bottom: 0;
            background-color: #F4F6F9;
        }
    </style>
@endsection