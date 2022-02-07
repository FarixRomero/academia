{{-- @extends('layouts.app') --}}
@extends('adminlte::page')

@section('title', 'Cursos')

@section('content_header')


@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Create Curso Horario</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('curso-horarios.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('curso-horario.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
