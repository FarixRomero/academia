<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('sesione_id') }}
            {{ Form::text('sesione_id', $file->sesione_id, ['class' => 'form-control' . ($errors->has('sesione_id') ? ' is-invalid' : ''), 'placeholder' => 'Sesione Id']) }}
            {!! $errors->first('sesione_id', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('tipo_file') }}
            {{ Form::text('tipo_file', $file->tipo_file, ['class' => 'form-control' . ($errors->has('tipo_file') ? ' is-invalid' : ''), 'placeholder' => 'Tipo File']) }}
            {!! $errors->first('tipo_file', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('orden') }}
            {{ Form::text('orden', $file->orden, ['class' => 'form-control' . ($errors->has('orden') ? ' is-invalid' : ''), 'placeholder' => 'Orden']) }}
            {!! $errors->first('orden', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('titulo') }}
            {{ Form::text('titulo', $file->titulo, ['class' => 'form-control' . ($errors->has('titulo') ? ' is-invalid' : ''), 'placeholder' => 'Titulo']) }}
            {!! $errors->first('titulo', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('descripcion') }}
            {{ Form::text('descripcion', $file->descripcion, ['class' => 'form-control' . ($errors->has('descripcion') ? ' is-invalid' : ''), 'placeholder' => 'Descripcion']) }}
            {!! $errors->first('descripcion', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('url') }}
            {{ Form::text('url', $file->url, ['class' => 'form-control' . ($errors->has('url') ? ' is-invalid' : ''), 'placeholder' => 'Url']) }}
            {!! $errors->first('url', '<div class="invalid-feedback">:message</p>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>