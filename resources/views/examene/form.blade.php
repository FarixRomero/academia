<div class="box box-info padding-1">
    <div class="box-body">
{{--         
        <div class="form-group">
            {{ Form::label('titulo') }}
            {{ Form::text('titulo', $examene->titulo, ['class' => 'form-control' . ($errors->has('titulo') ? ' is-invalid' : ''), 'placeholder' => 'Titulo']) }}
            {!! $errors->first('titulo', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('descripcion') }}
            {{ Form::text('descripcion', $examene->descripcion, ['class' => 'form-control' . ($errors->has('descripcion') ? ' is-invalid' : ''), 'placeholder' => 'Descripcion']) }}
            {!! $errors->first('descripcion', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('is_active') }}
            {{ Form::text('is_active', $examene->is_active, ['class' => 'form-control' . ($errors->has('is_active') ? ' is-invalid' : ''), 'placeholder' => 'Is Active']) }}
            {!! $errors->first('is_active', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('hora_inicio') }}
            {{ Form::text('hora_inicio', $examene->hora_inicio, ['class' => 'form-control' . ($errors->has('hora_inicio') ? ' is-invalid' : ''), 'placeholder' => 'Hora Inicio']) }}
            {!! $errors->first('hora_inicio', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('duracion') }}
            {{ Form::text('duracion', $examene->duracion, ['class' => 'form-control' . ($errors->has('duracion') ? ' is-invalid' : ''), 'placeholder' => 'Duracion']) }}
            {!! $errors->first('duracion', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('hora_fin') }}
            {{ Form::text('hora_fin', $examene->hora_fin, ['class' => 'form-control' . ($errors->has('hora_fin') ? ' is-invalid' : ''), 'placeholder' => 'Hora Fin']) }}
            {!! $errors->first('hora_fin', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('url') }}
            {{ Form::text('url', $examene->url, ['class' => 'form-control' . ($errors->has('url') ? ' is-invalid' : ''), 'placeholder' => 'Url']) }}
            {!! $errors->first('url', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('url2') }}
            {{ Form::text('url2', $examene->url2, ['class' => 'form-control' . ($errors->has('url2') ? ' is-invalid' : ''), 'placeholder' => 'Url2']) }}
            {!! $errors->first('url2', '<div class="invalid-feedback">:message</p>') !!}
        </div> --}}
        <div class="card-body field_wrapper">
            <input type="hidden" class="form-control" id="sesion_id" name="sesion_id" placeholder="Enter email"
                value="{{ request()->route('id') }}">
            <div class="form-group">
                <label for="titulo">Titulo</label>
                <input type="text" class="form-control" name="titulo" placeholder="titulo" value="{{$examene->titulo}}">
            </div>
            <div class="form-group">
                <label for="descripcion">Descripcion</label>
                <input type="text" class="form-control" name="descripcion" placeholder="descripcion" value="{{$examene->descripcion}}">
            </div>
            <input type="text" placeholder="Seleciona Dia Hora" id="hora_inicio" name="hora_inicio">
            <select name="duracion" id="duracion">
                <option value="15">15m</option>
                <option value="30">30m</option>
                <option value="45">45m</option>
                <option value="60">60m</option>
            </select>
            <div class="form-group" id="archivo_input">
                <label for="">Archivo</label>
                <input type="file" name="file" id="file" class="form-control-file" placeholder=""
                    aria-describedby="helpId">
                <small id="helpId" class="text-muted">Agregar solo un archivo</small>
            </div>
            <div class=" form-group custom-control custom-switch">
                <input type="hidden" name="is_active" value="0">
                <input type="checkbox" class="custom-control-input" id="is_active" name="is_active" value="1">
                <label class="custom-control-label" for="is_active">Esta Activo</label>
            </div>

        </div>
    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>
@section('js')
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script>
        flatpickr("#hora_inicio", {
            enableTime: true,
            dateFormat: "Y-m-d H:i",
            // defaultHour: 16,
            // defaultMinute: 00,
             defaultDate: "{{ $examene->hora_inicio }}" 
        });
    </script>
@endsection
@section('css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
@endsection
