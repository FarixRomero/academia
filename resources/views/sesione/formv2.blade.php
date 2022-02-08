
<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Crear Sesion</h3>
    </div>
    <form method="POST" action="{{ route('sesiones.store') }}" role="form" enctype="multipart/form-data">
        <div class="card-body">
            {{-- <div class="form-group">
                <label for="curso_horario_id">Curso horario id</label>
            </div> --}}
            <input type="hidden" class="form-control" id="curso_horario_id" name="curso_horario_id" placeholder="Enter email" value="{{$curso_horario_id}}">
            <div class="form-group">
                <label for="titulo">Titulo</label>
                <input type="text" class="form-control" name="titulo" placeholder="Titulo">
            </div>
            <div class="form-group">
                <label for="descripcion">descripcion</label>
                <input type="text" class="form-control" name="descripcion" placeholder="descripcion">
            </div>
            <div class="form-group">
                <label for="is_active">is_active</label>
                <input type="text" class="form-control" name="is_active" placeholder="is_active">
            </div>
        
            <div class="form-check">
                <input type="checkbox" class="form-check-input" name="exampleCheck1">
                <label class="form-check-label" for="exampleCheck1">Check me out</label>
            </div>
        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
        @csrf

    </form>
</div>
