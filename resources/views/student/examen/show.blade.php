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
                            <h2 class="card-title">{{ $examenUser->examene->titulo }}</h2>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('examenes.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="form-group">
                            {{ $examenUser->examene->descripcion }}
                        </div>
                        <a href="{{ asset($examenUser->examene->url) }}" download>
                            <i class="fa fa-file-pdf fa-3x"></i><span class="info-box-text m-1">
                                {{ basename($examenUser->examene->url) }}</span>
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
                                <span class="description-text">{{ $examenUser->examene->hora_fin }}</span>
                            </div>

                        </div>

                        <div class="col-sm-3 col-6">
                            <div class="description-block border-right">
                                <span class="description-percentage text">Estado de la calificación
                                </span>
                                <h5 class="description-header"><i class="fa fa-clock fa-3x" aria-hidden="true"></i></h5>
                                <span
                                    class="description-text">{{ $examenUser->examene->nota ? 'HA SIDO CALIFICADO' : 'No ha sido calificado' }}</span>
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
                                <span class="description-text">{{ $examenUser->examene->duracion }}</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Archivos enviados</span>
                        </div>
                    </div>
                    @if (!$examenUser->url_student && $diff>0 )
                        <form method="POST" action="{{ route('student.examen.update', $examenUser->id) }}" role="form"
                            enctype="multipart/form-data">
                            @csrf
                            {{ method_field('PUT') }}
                            <div class="card-body">
                                <div class="form-group" id="archivo_input">
                                    <label for="">Mensaje</label>
                                    <input type="textarea" name="comentario_student" id="comentario_student"
                                        class="form-control">
                                </div>
                                <div class="form-group" id="archivo_input">
                                    <label for="">Archivo</label>
                                    <input type="file" name="file_student" id="file_student" class="form-control-file"
                                        placeholder="" aria-describedby="helpId">
                                    <small id="helpId" class="text-muted">Agregar solo un archivo</small>
                                </div>
                                <div class="box-footer mt20">
                                    <button type="submit" class="btn btn-primary">Enviar</button>
                                </div>
                            </div>
                        </form>
                    @else
                        <div class="card-body">
                            <form method="POST" action="{{ route('student.examen.update', $examenUser->id) }}"
                                role="form" enctype="multipart/form-data">
                                @csrf
                                {{ method_field('PUT') }}
                                <div class="form-group" id="archivo_input">
                                    <label for="">Mensaje</label>
                                    <input type="textarea" name="comentario_student" id="comentario_student"
                                        class="form-control" value="{{ $examenUser->comentario_student }}" disabled>
                                </div>
                                <div class="form-group" id="div_input">
                                    <p><label for="">Archivo Enviado</label> </p>
                                    <a href="{{ asset($examenUser->url_student) }}" download>
                                        <i class="fa fa-file-pdf fa-3x"></i><span class="info-box-text m-1">
                                            {{ basename($examenUser->url_student) }}</span>
                                    </a>
                                    @if ($diff > 0)
                                        <a id="div_editar" href="#" onclick="clickButton()">
                                            <span>Editar</span>
                                        </a>
                                        <a id="div_eliminar" href="">
                                            Eliminar
                                        </a>
                                    @endif
                                </div>
                            </form>
                        </div>
                    @endif

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
                                <h2 class="">{{ $examenUser->nota ? $examenUser->nota : '-' }} / 20,00</h2>

                            </div>

                        </div>

                        <div class="col-sm-8 ">
                            <div class="description-block border-right">
                                <span class="description-percentage text">Retroalimentación
                                </span>
                                <h5 class="description-header">{{ $examenUser->comentario }}</h5>
                                <a href="{{ asset($examenUser->url) }}" download>
                                    <span class="description-text">
                                        {{ $examenUser->url ? basename($examenUser->url) : '-' }}</span>
                                </a>

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
                    const final = document.getElementById('div_editar');
                    final.parentNode.removeChild(final);
                    const final2 = document.getElementById('div_eliminar');
                    final2.parentNode.removeChild(final2);
                }

            }, 1000)
        };

        var jobs = "{{ $examenUser->examene->hora_fin }}";
        countdown(jobs, 'clock', 'Finalizo');

        const clickButton = function() {
            const elem = document.getElementById('div_input');
            var html_to_insert = `<div id="form_agregado">     
                             <div class="form-group" id="archivo_input" >
                                    <label for="">Archivo</label>
                                    <input type="file" name="file_student" id="file_student" class="form-control-file"
                                        placeholder="" aria-describedby="helpId">
                                    <small id="helpId" class="text-muted">Agregar solo un archivo</small>
                                </div>
                                <div class="box-footer mt20">
                                    <button type="submit" class="btn btn-primary">Enviar</button>
                                </div>
                                </div>
                                
                                `;
            insertedContent = document.getElementById('form_agregado');
            if (insertedContent) {
                insertedContent.parentNode.removeChild(insertedContent);
            } else {
                elem.insertAdjacentHTML('beforeend', html_to_insert);
            }
        }
    </script>
@endsection
