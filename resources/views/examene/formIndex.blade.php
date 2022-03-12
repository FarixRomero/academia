<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Crear Archivo</h3>
    </div>
    <form method="POST" action="{{ route('examenes.store') }}" role="form" enctype="multipart/form-data">
        @csrf
        <div class="card-body field_wrapper">
            <input type="hidden" class="form-control" id="sesion_id" name="sesion_id" placeholder="Enter email"
                value="{{ request()->route('id') }}">
            <div class="form-group">
                <label for="titulo">Titulo</label>
                <input type="text" class="form-control" name="titulo" placeholder="titulo">
            </div>
            <div class="form-group">
                <label for="descripcion">Descripcion</label>
                <input type="text" class="form-control" name="descripcion" placeholder="descripcion">
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

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>

    </form>
</div>
{{-- <div class="field_wrapper">
    <div>
        <input type="text" name="field_name[]" value=""/>
        <input type="text" name="tipo[]" value=""/> 
        <select name="select[]">
            <option value="value1">Value 1</option>
            <option value="value2" selected>Value 2</option>
            <option value="value3">Value 3</option>
          </select>
        <a href="javascript:void(0);" class="add_button" title="Add field"><i class="fa fa-plus-circle" aria-hidden="true"></i></a>
    </div>
</div> --}}
@section('js')
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script>
        flatpickr("#hora_inicio", {
            enableTime: true,
            dateFormat: "Y-m-d H:i",
            // defaultHour: 16,
            // defaultMinute: 00,
             defaultDate: "2020-11-26 14:30"
        });
    </script>
@endsection
@section('css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
@endsection
