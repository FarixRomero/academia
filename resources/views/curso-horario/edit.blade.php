@extends('layouts.app')

@section('template_title')
    Update Curso Horario
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Update Curso Horario</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('curso-horarios.update', $cursoHorario->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('curso-horario.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
