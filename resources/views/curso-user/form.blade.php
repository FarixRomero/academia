<div class="box box-info padding-1">
    <div class="box-body">
        <div class="form-group">
            <label for="exampleFormControlSelect1">Example select</label>
            <select class="form-control" id="curso_id" name="curso_id">
                @foreach ($cursos as $curso)
                    <option value="{{ $curso->id }}">{{ $curso->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="exampleFormControlSelect1">Example select</label>
            <select class="form-control" id="user_id" name="user_id">
                @foreach ($usuarios as $usuario)
                    <option value="{{ $usuario->id }}">{{ $usuario->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="exampleFormControlSelect1">Dia de Inicio</label>
            <input type="date" name="fecha_inicio"  id="datePicker" class="form-control"  >
        </div>
        <div class=" form-group custom-control custom-switch">
            <input type="hidden" name="is_active" value="0">
            <input type="checkbox" class="custom-control-input" id="is_active" name="is_active" value="1">
            <label class="custom-control-label" for="is_active">Esta Activo</label>
        </div>
    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>
@section('js')
    <script>

    document.getElementById('datePicker').valueAsDate = new Date();

    </script>
@endsection