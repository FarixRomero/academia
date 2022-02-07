<div class="box box-info padding-1">
    <div class="box-body">
        <div class="form-group">
            <label for="exampleFormControlSelect1">Example select</label>
            <select class="form-control" id="curso_id" name="curso_id">
                @foreach ($cursos as $curso)
                <option value="{{$curso->id}}">{{$curso->name}}</option>
              @endforeach
            </select>
          </div>
          <div class="form-group">
            <label for="exampleFormControlSelect1">Example select</label>
            <select class="form-control" id="horario_id" name="horario_id">
              @foreach ($horarios as $horario)
                <option value="{{$horario->id}}">{{$horario->name}}</option>
              @endforeach
            </select>
          </div>
                
      
        <div class="form-group">
            {{ Form::label('name') }}
            {{ Form::text('name', $cursoHorario->name, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => 'Name']) }}
            {!! $errors->first('name', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        {{-- <div class="form-group">
            {{ Form::label('is_active') }}
            {{ Form::text('is_active', $cursoHorario->is_active, ['class' => 'form-control' . ($errors->has('is_active') ? ' is-invalid' : ''), 'placeholder' => 'Is Active']) }}
            {!! $errors->first('is_active', '<div class="invalid-feedback">:message</p>') !!}
        </div> --}}
        {{-- Is Active  --}}
        <div class=" form-group custom-control custom-switch">
            <input type="hidden"  name="is_active" value="0">
            <input type="checkbox" class="custom-control-input" id="is_active" name="is_active" value="1">
            <label class="custom-control-label" for="is_active">Esta Activo</label>
          </div>
    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>