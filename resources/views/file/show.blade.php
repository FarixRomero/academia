@extends('layouts.app')

@section('template_title')
    {{ $file->name ?? 'Show File' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show File</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('files.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Sesione Id:</strong>
                            {{ $file->sesione_id }}
                        </div>
                        <div class="form-group">
                            <strong>Tipo File:</strong>
                            {{ $file->tipo_file }}
                        </div>
                        <div class="form-group">
                            <strong>Orden:</strong>
                            {{ $file->orden }}
                        </div>
                        <div class="form-group">
                            <strong>Titulo:</strong>
                            {{ $file->titulo }}
                        </div>
                        <div class="form-group">
                            <strong>Descripcion:</strong>
                            {{ $file->descripcion }}
                        </div>
                        <div class="form-group">
                            <strong>Url:</strong>
                            {{ $file->url }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
