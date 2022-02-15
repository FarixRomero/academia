{{-- @extends('layouts.app') --}}
@extends('adminlte::page')

@section('title', 'Horario')

@section('content_header')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Examene User') }}
                            </span>

                            <div class="float-right">
                                <a href="{{ route('examene-users.create') }}" class="btn btn-primary btn-sm float-right"
                                    data-placement="left">
                                    {{ __('Create New') }}
                                </a>
                            </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        {{-- <th>No</th> --}}

                                        {{-- <th>Examene Id</th> --}}
                                        <th>Estudiante</th>
                                        {{-- <th>Entrego Tarde</th> --}}
                                        <th>Nota</th>
                                        <th>Comentario Usuario</th>
                                        <th>Retroalimentacion</th>
                                        <th>Documento Estudiante</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($exameneUsers as $exameneUser)
                                        <tr>
                                            {{-- <td>{{ ++$i }}</td> --}}

                                            {{-- <td>{{ $exameneUser->examene->titulo }}</td> --}}
                                            <td>{{ $exameneUser->user->name }}</td>
                                            {{-- <td>{{ $exameneUser->entrego_tarde }}</td> --}}
                                            <td>{{ $exameneUser->nota }}</td>
                                            <td>{{ $exameneUser->comentario_student }}</td>
                                            <td>{{ $exameneUser->comentario }}</td>
                                            {{-- <td>{{ $exameneUser->url_student }}</td> --}}
                                            <td>
                                                <a href="{{ asset($exameneUser->url_student) }}" download>
                                                    <i class="fa fa-file-pdf "></i><span class="info-box-text m-1">
                                                        {{ basename($exameneUser->url_student) }}</span>
                                                </a>

                                            </td>

                                            <td>
                                                {{-- <a class="btn btn-sm btn-primary "
                                                    href="{{ route('examene-users.show', $exameneUser->id) }}"><i
                                                        class="fa fa-fw fa-eye"></i> Ver</a> --}}
                                                <a class="btn btn-sm btn-success"
                                                    href="{{ route('examene-users.edit', $exameneUser->id) }}"><i
                                                        class="fa fa-fw fa-edit"></i> Corregir</a>

                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $exameneUsers->links() !!}
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-10 offset-md-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Dashboard</div>
                    <div class="panel-body">
                        <canvas id="canvas" height="280" width="600"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>
    <script>
        var year = <?php echo $year; ?>;
        var user = <?php echo $user; ?>;
        var barChartData = {
            labels: year,
            datasets: [{
                label: 'Cant',
                backgroundColor: "blue",
                data: user
            }]
        };

        window.onload = function() {
            var ctx = document.getElementById("canvas").getContext("2d");
            window.myBar = new Chart(ctx, {
                type: 'bar',
                data: barChartData,
                options: {
                    elements: {
                        rectangle: {
                            borderWidth: 2,
                            borderColor: '#c1c1c1',
                            borderSkipped: 'bottom'
                        }
                    },
                    responsive: true,
                    title: {
                        display: true,
                        text: 'Yearly User Joined'
                    },
                    scales: {
                        yAxes: [{
                            ticks: {
                                stepSize: 1,
                                beginAtZero: true,
                            },
                        }],
                    },
                }
            });
        };
    </script>
@endsection
