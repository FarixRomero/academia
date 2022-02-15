{{-- @extends('layouts.app') --}}
@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
@stop

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            {{-- <li class="breadcrumb-item"><a href="{{ route('cursos.index') }}">Cursos</a></li> --}}
            <li class="breadcrumb-item active">Sesiones</li>
        </ol>
    </nav>
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-10 p-1">

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
                                @if ($sesion->files->first() || $sesion->examenes->first())
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
                                        @foreach ($sesion->examenes as $examen)
                                            <div class="col-md-4">
                                                <a href="{{ route('student.examen.show', [ request()->route('id'),$examen->id]) }}">
                                                    <div class="info-box bg-blue-grey">
                                                        <span class="info-box-icon bg-info elevation-1">
                                                            <i class="fa fa-sticky-note"></i>
                                                        </span>
                                                        <div class="info-box-content">
                                                            <span class="info-box-text"> {{ $examen->titulo }}</span>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        @endforeach
                                    </div>
                                @endif
                            </div>

                        </div>
                    @endif
                @endforeach
            </div>
            <div class="col-md-2">

                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>150</h3>
                        <p>New Orders</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-shopping-cart"></i>
                    </div>
                    <a href="#" class="small-box-footer">
                        More info <i class="fas fa-arrow-circle-right"></i>
                    </a>
                </div>
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
