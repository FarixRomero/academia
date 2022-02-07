{{-- @extends('layouts.app') --}}
@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content')
    <section class="content container-fluid p-1">
     
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{route('sesiones.index')}}">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Sesion</li>
            </ol>
          </nav>
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Create Sesione</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('sesiones.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('sesione.form')
                            <div class="field_wrapper">
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
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('js')
<script type="text/javascript">
    $(document).ready(function(){
        var maxField = 10; //Input fields increment limitation
        var addButton = $('.add_button'); //Add button selector
        var wrapper = $('.field_wrapper'); //Input field wrapper
        var fieldHTML = `<div><input type="text" name="field_name[]" value=""/>  <input type="text" name="tipo[]" value=""/> <select name="select[]">
                                        <option value="value1">Value 1</option>
                                        <option value="value2" selected>Value 2</option>
                                        <option value="value3">Value 3</option>
                                      </select> <a href="javascript:void(0);" class="remove_button"><i class="fa fa-trash" aria-hidden="true"></i></a></div>`; //New input field html 
        var x = 1; //Initial field counter is 1
        
        //Once add button is clicked
        $(addButton).click(function(){
            //Check maximum number of input fields
            if(x < maxField){ 
                x++; //Increment field counter
                $(wrapper).append(fieldHTML); //Add field html
            }
        });
        
        //Once remove button is clicked
        $(wrapper).on('click', '.remove_button', function(e){
            e.preventDefault();
            $(this).parent('div').remove(); //Remove field html
            x--; //Decrement field counter
        });
    });
    </script>
@endsection
