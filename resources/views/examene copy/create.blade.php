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
                        <span class="card-title">Create Examene</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('examenes.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('examene.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection