<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('curso_horario_id') }}
            {{ Form::text('curso_horario_id', $examene->curso_horario_id, ['class' => 'form-control' . ($errors->has('curso_horario_id') ? ' is-invalid' : ''), 'placeholder' => 'Curso Horario Id']) }}
            {!! $errors->first('curso_horario_id', '<div class="invalid-feedback">:message</p>') !!}
        </div>
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
        <input type="text" placeholder="Seleciona Dia Hora" id="hora_inicio" name="hora_inicio">
        <select name="duracion" id="duracion">
            <option value="15">15m</option>
            <option value="30">30m</option>
            <option value="45">45m</option>
            <option value="60">60m</option>
        </select>

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
        });

    </script>
@endsection
@section('css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

@endsection