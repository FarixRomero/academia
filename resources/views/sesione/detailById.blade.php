{{-- @extends('layouts.app') --}}
@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
@stop

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12 p-1">
                <div class="card card-primary">
                    <div class="card-header ">
                        <div class="float-left">
                            <span class="card-title">Sesiones</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ url()->previous() }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">

                        <div class="form-group">
                            <h2 class="text-primary">{{ $sesion->titulo }}</h2>
                        </div>
                        <div class="form-group">
                            <p>
                                {!! nl2br(e($sesion->descripcion)) !!}
                            </p>
                        </div>
                        @if ($sesion->files->first())
                            <h4>Archivos</h4>
                        @endif
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
                                                        {{-- <p>{{ $file->descripcion }}</p>  --}}
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                @endif
                                @if ($file->tipo_file == 2)
                                    <div class="col-md-4">
                                        <a href=" {{ asset($file->url) }}" target="_blank" >
                                            <div class="info-box bg-blue-grey">
                                                <span class="info-box-icon bg-info elevation-1">
                                                    <i class="fa fa-globe"></i>
                                                </span>
                                                <div class="info-box-content">
                                                    <span class="info-box-text"> {{ $file->titulo }}</span>
                                                        {{-- <p>{{ $file->descripcion }}</p>  --}}
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                @endif
                            @endforeach
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
