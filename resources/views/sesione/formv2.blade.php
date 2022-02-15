
<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Crear Sesion</h3>
    </div>
    <form method="POST" action="{{ route('sesiones.store') }}" role="form" enctype="multipart/form-data">
        <div class="card-body">
            {{-- <div class="form-group">
                <label for="curso_id">Curso horario id</label>
            </div> --}}
            <input type="hidden" class="form-control" id="curso_id" name="curso_id" placeholder="Enter email" value="{{$curso_id}}">
            <div class="form-group">
                <label for="titulo">Titulo</label>
                <input type="text" class="form-control" name="titulo" placeholder="Titulo">
            </div>
            <div class="form-group">
                <label for="descripcion">descripcion</label>
                <input type="text" class="form-control" name="descripcion" placeholder="descripcion">
            </div>
            <div class="form-group custom-control custom-switch">
                <input type="hidden" name="is_active" value="0">
                <input type="checkbox" class="custom-control-input" id="is_active" name="is_active" value="1" checked>
                <label class="custom-control-label" for="is_active">Esta Activo</label>
            </div>
        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
        @csrf

    </form>
</div>
