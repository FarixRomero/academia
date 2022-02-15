<div class="box box-info padding-1">
    <div class="form-group">
        <h4>Examen:</h4>
        <a href="{{ asset($exameneUser->examene->url) }}" download>
            <i class="fa fa-file-pdf "></i><span class="info-box-text m-1">
                {{ basename($exameneUser->examene->url) }}</span>
        </a>
        <h4>Archivo de Alumno:</h4>
        <a href="{{ asset($exameneUser->url_student) }}" download>
            <i class="fa fa-file-pdf "></i><span class="info-box-text m-1">
                {{ basename($exameneUser->url_student) }}</span>
        </a>
    </div>
  
    <div class="box-body">
        <div class="form-group">
            {{ Form::label('nota') }}
            {{ Form::text('nota', $exameneUser->nota, ['class' => 'form-control' . ($errors->has('nota') ? ' is-invalid' : ''), 'placeholder' => 'Nota']) }}
            {!! $errors->first('nota', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            <label for="">Comentario</label>
            <textarea class="form-control" name="comentario" id="" cols="30" rows="3" >{{$exameneUser->comentario}}}
            </textarea>
        </div>
        @if($exameneUser->url)
            <h4>Archivo de Retroalimentacion:</h4>
            <a href="{{ asset($exameneUser->url) }}" download>
                <i class="fa fa-file-pdf "></i><span class="info-box-text m-1">
                    {{ basename($exameneUser->url) }}</span>
            </a>
        @endif
        <div class="form-group" id="archivo_input">
            <label for="">Archivo</label>
            <input type="file" name="file_profe" id="file" class="form-control-file" placeholder="" aria-describedby="helpId">
            <small id="helpId" class="text-muted">Agregar solo un archivo</small>
          </div>
    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>