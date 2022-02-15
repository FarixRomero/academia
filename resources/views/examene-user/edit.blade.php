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
                        <span class="card-title">Update Examene User</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('examene-users.update', $exameneUser->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('examene-user.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
