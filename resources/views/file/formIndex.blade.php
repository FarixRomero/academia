
<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Crear Archivo</h3>
    </div>
    <form method="POST" action="{{ route('file.storeApi') }}" role="form" enctype="multipart/form-data">
        @csrf
        <div class="card-body field_wrapper">
            <input type="hidden" class="form-control" id="sesion_id" name="sesion_id" placeholder="Enter email" value="{{$sesion_id}}">
            <div class="form-group">
                <label for="tipo_file">Tipo de Archivo</label>
                <select name="tipo_file" id="" class="form-control add_button">
                    <option value="1" selected>Pdf</option>
                    <option value="2">Link Zoom</option>
                    <option value="3">Imagen</option>
                </select>
                {{-- <input type="text" class="form-control" name="tipo_file" placeholder="tipo_file"> --}}
            </div>
            <div class="form-group">
                <label for="titulo">Titulo</label>
                <input type="text" class="form-control" name="titulo" placeholder="titulo">
            </div>
            <div class="form-group">
                <label for="descripcion">Descripcion</label>
                <input type="text" class="form-control" name="descripcion" placeholder="descripcion">
            </div>
           <div class="form-group" id="archivo_input">
              <label for="">Archivo</label>
              <input type="file" name="file" id="file" class="form-control-file" placeholder="" aria-describedby="helpId">
              <small id="helpId" class="text-muted">Agregar solo un archivo</small>
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
<script type="text/javascript">
    $(document).ready(function(){
        var maxField = 2; //Input fields increment limitation
        var addButton = $('.add_button'); //Add button selector
        var wrapper = $('.field_wrapper'); //Input field wrapper
        var fieldHTML = `<div class="form-group" id="link_form">
                <label for="url">Link</label>
                <input type="text" class="form-control" name="url" placeholder="url">
            </div>`; //New input field html 
        var fieldHTMLArchivo = `<div class="form-group" id="archivo_input">
              <label for="">Archivo</label>
              <input type="file" name="file" id="file" class="form-control-file" placeholder="" aria-describedby="helpId">
              <small id="helpId" class="text-muted">Agregar solo un archivo</small>
            </div>`; //New input field html 
        var x = 1; //Initial field counter is 1
        var y =1;
        // if($('.add_button').val()==1){
        //     $(wrapper).append(fieldHTML); //Add field html

        // }
        //Once add button is clicked
        $(addButton).change(function(){
            var bla = $(addButton).val();
            //Check maximum number of input fields
            if(x =='1' && bla=='2'){ 
                x=0; //Increment field counter
                $(wrapper).append(fieldHTML); //Add field html
                $(wrapper).parent('div').remove(); //Remove field html
                $("#archivo_input").remove()
                y =0;
            }else{
                $(wrapper).parent('div').remove(); //Remove field html
                if(y ==0){
                    $(wrapper).append(fieldHTMLArchivo); //Add field html
                    y=1 ;
                }
                x=1;                
                $("#link_form").remove()
            }
        });
        
        //Once remove button is clicked
        $(wrapper).on('click', '.remove_button', function(e){
            e.preventDefault();
            x--; //Decrement field counter
        });
    });
    </script>
@endsection
