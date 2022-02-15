<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('sesione_id') }}
            {{ Form::text('sesione_id', $examene->sesione_id, ['class' => 'form-control' . ($errors->has('sesione_id') ? ' is-invalid' : ''), 'placeholder' => 'Sesione Id']) }}
            {!! $errors->first('sesione_id', '<div class="invalid-feedback">:message</p>') !!}
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
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>