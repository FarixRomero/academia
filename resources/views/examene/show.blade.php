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
                            <h2 class="card-title">{{$examene->titulo }}</h2>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('examenes.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="form-group">
                            {{ $examene->descripcion }}
                        </div>
                        <a href="{{ asset($examene->url) }}" download>
                            <i class="fa fa-file-pdf fa-3x"></i><span class="info-box-text m-1"> {{ basename($examene->url  ) }}</span>
                        </a>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Estado de la entrega</span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-3 col-6">
                            <div class="description-block border-right">
                                <span class="description-percentage text"> Fecha Entrega
                                </span>
                                <h5 class="description-header"><i class="fa fa-calendar fa-3x" aria-hidden="true"></i></h5>
                                <span class="description-text">{{ $examene->hora_fin }}</span>
                            </div>

                        </div>

                        <div class="col-sm-3 col-6">
                            <div class="description-block border-right">
                                <span class="description-percentage text">Estado de la calificación
                                </span>
                                <h5 class="description-header"><i class="fa fa-clock fa-3x" aria-hidden="true"></i></h5>
                                <span
                                    class="description-text">{{ $examene->nota ? 'HA SIDO CALIFICADO' : 'No ha sido calificado' }}</span>
                            </div>

                        </div>
                        <div class="col-sm-3 col-6">
                            <div class="description-block border-right">
                                <span class="description-percentage text">Tiempo restante
                                </span>
                                <h5 class="description-header"><i class="fa fa-cog fa-3x" aria-hidden="true"></i></h5>
                                <span class="description-text">
                                    <div id="clock"></div>
                                </span>
                            </div>

                        </div>

                        <div class="col-sm-3 col-6">
                            <div class="description-block border-right">
                                <span class="description-percentage text">Duración
                                </span>
                                <h5 class="description-header"><i class="fa fa-check-square fa-3x" aria-hidden="true"></i>
                                </h5>
                                <span class="description-text">{{ $examene->duracion }}</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">
                                Resultado de la entrega</span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="description-block border-right">
                                <span class="description-percentage text"> Calificacion
                                </span>
                                <h2 class="">- / 20,00</h2>
                               
                            </div>

                        </div>

                        <div class="col-sm-8 ">
                            <div class="description-block border-right">
                                <span class="description-percentage text">Retroalimentación
                                </span>
                                <h5 class="description-header">lorem</h5>
                                <span
                                    class="description-text">url</span>
                            </div>

                        </div>
                    </div>
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
