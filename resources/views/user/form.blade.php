<div class="box box-info padding-1">
    <div class="box-body">
        <div class="row">

            <div class="form-group  col-md-6">
                <span>Nombre Completo </span>
                <input type="text" name="name" value="{{$user->name}}" class="form-control">
            </div>
            <div class="form-group col-md-4">
                <span>E-mail </span>
                <input type="text" name="email" value="{{$user->email}}" class="form-control">
            </div>
            <div class="form-group col-md-4">
                <span>Contraseña </span>
                <input type="password" name="password" class="form-control">
            </div>
            <div class="form-group col-md-4">
                <span>Tipo </span>
                {{-- <input type="password" name="password" class="form-control"> --}}
                <select name="tipo_usuario" class="form-control"  aria-label="size 3 select example">
                    <option {{$user->type=="1"? 'selected':'' }} value="1">Administrador</option>
                    <option {{$user->type=="2"? 'selected':'' }} value="2">Profesor</option>
                    <option {{$user->type=="3"? 'selected':'' }} value="3">Alumno</option>
                </select>
            </div>

        </div>
        <div class="box-footer mt20 ">
            <button type="submit" class="btn btn-primary  col-md-12">Confirmar</button>
        </div>
    </div>

</div>
