{{-- @extends('layouts.app') --}}
@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
@stop

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Sesiones</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('sesiones.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        @foreach ($sesiones as $sesion)
                            @if ($sesion->is_active)
                                <div class="form-group">
                                    <h2 class="text-primary">{{ $sesion->titulo }}</h2>
                                </div>
                                <div class="form-group">
                                    <p>
                                        {!! nl2br(e($sesion->descripcion)) !!}
                                    </p>
                                </div>
                                @foreach ($sesion->files as $file)
                                    @if ($file->tipo_file==1)
                                        <a href=" {{asset($file->url)}}"><i class="fa fa-file-pdf"></i>
                                            <p> {{$file->titulo}}</p></a>
                                    @endif
                                @endforeach
                            @endif
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
