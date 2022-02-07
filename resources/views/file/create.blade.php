{{-- @extends('layouts.app') --}}
@extends('adminlte::page')

@section('title', 'Horario')

@section('content_header')

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Create File</span>
                    </div>
                    <div class="card-body">
                        {{-- <form method="POST" action="{{ route('files.store') }}" role="form" enctype="multipart/form-data">
                            @csrf

                            @include('file.form')
                            <label for="file">Escoge archivos</label>
                            <input type="file" class="form-control" name="file" id="file" > 
                            <button type="submit">aaaa</button>
                        </form> --}}
                        <form method="POST" action="{{ route('files.store') }}" action="/file-upload"
                            class="dropzone" id="subir-imagenes">
                        </form>
                     
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('css')

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.2/dropzone.css"
        integrity="sha512-7uSoC3grlnRktCWoO4LjHMjotq8gf9XDFQerPuaph+cqR7JC9XKGdvN+UwZMC14aAaBDItdRj3DcSDs4kMWUgg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

@endsection
@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.2/min/dropzone.min.js"
        integrity="sha512-VQQXLthlZQO00P+uEu4mJ4G4OAgqTtKG1hri56kQY1DtdLeIqhKUp9W/lllDDu3uN3SnUNawpW7lBda8+dSi7w=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        Dropzone.options.subirImagenes = {
            acceptedFiles: 'image/*',
            autoProcessQueue: true,
            // uploadMultiple: true,
            // parallelUploads: 6,
            // maxFiles: 6,
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
            // init: function() {
            //     var myDropzone = this;

            //     $("#submit-all").click(function(e) {
            //         // e.preventDefault();
            //         e.stopPropagation();
            //         myDropzone.processQueue();
            //     });
            // }
        };
    </script>
@endsection
