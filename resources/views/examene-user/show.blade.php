@extends('layouts.app')

@section('template_title')
    {{ $exameneUser->name ?? 'Show Examene User' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Examene User</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('examene-users.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Examene Id:</strong>
                            {{ $exameneUser->examene_id }}
                        </div>
                        <div class="form-group">
                            <strong>User Id:</strong>
                            {{ $exameneUser->user_id }}
                        </div>
                        <div class="form-group">
                            <strong>Entrego Tarde:</strong>
                            {{ $exameneUser->entrego_tarde }}
                        </div>
                        <div class="form-group">
                            <strong>Nota:</strong>
                            {{ $exameneUser->nota }}
                        </div>
                        <div class="form-group">
                            <strong>Comentario:</strong>
                            {{ $exameneUser->comentario }}
                        </div>
                        <div class="form-group">
                            <strong>Url:</strong>
                            {{ $exameneUser->url }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
