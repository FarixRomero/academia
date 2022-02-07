{{-- @extends('layouts.app') --}}
@extends('adminlte::page')

@section('title', 'Horario')

@section('content_header')

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Update File</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('files.update', $file->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('file.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
