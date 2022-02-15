{{-- @extends('layouts.app') --}}
@extends('adminlte::page')

@section('title', 'Horario')

@section('content_header')
@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Examene</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('examenes.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">

                        <div class="form-group">
                            <strong>Curso Horario Id:</strong>
                            {{ $examene->curso_horario_id }}
                        </div>
                        <div class="form-group">
                            <strong>Titulo:</strong>
                            {{ $examene->titulo }}
                        </div>
                        <div class="form-group">
                            <strong>Descripcion:</strong>
                            {{ $examene->descripcion }}
                        </div>
                        <div class="form-group">
                            <strong>Is Active:</strong>
                            {{ $examene->is_active }}
                        </div>
                        <div class="form-group">
                            <strong>Hora Inicio:</strong>
                            {{ $examene->hora_inicio }}
                        </div>
                        <div class="form-group">
                            <strong>Duracion:</strong>
                            {{ $examene->duracion }}
                        </div>
                        <div class="form-group">
                            <strong>Hora Fin:</strong>
                            {{ $examene->hora_fin }}
                        </div>
                        <div id="clock"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('js')
    <script>
        const getRemainingTime = deadline => {
            let now = new Date(),
                remainTime = (new Date(deadline) - now + 1000) / 1000,
                remainSeconds = ('0' + Math.floor(remainTime % 60)).slice(-2),
                remainMinutes = ('0' + Math.floor(remainTime / 60 % 60)).slice(-2),
                remainHours = ('0' + Math.floor(remainTime / 3600 % 24)).slice(-2),
                remainDays = Math.floor(remainTime / (3600 * 24));

            return {
                remainSeconds,
                remainMinutes,
                remainHours,
                remainDays,
                remainTime
            }
        };

        const countdown = (deadline, elem, finalMessage) => {
            const el = document.getElementById(elem);

            const timerUpdate = setInterval(() => {
                let t = getRemainingTime(deadline);
                el.innerHTML = `${t.remainHours}h:${t.remainMinutes}m:${t.remainSeconds}s`;

                if (t.remainTime <= 1) {
                    clearInterval(timerUpdate);
                    el.innerHTML = finalMessage;
                }

            }, 1000)
        };
       
        var jobs = "{{ $examene->hora_fin }}";
        countdown(jobs, 'clock', '¡Ya empezó!');
    </script>
@endsection
