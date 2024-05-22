@extends('layouts.developer')

@section('main-content')
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">{{ __('Panel de Control') }}</h1>

    @if (session('success'))
        <div class="alert alert-success border-left-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    @if (session('status'))
        <div class="alert alert-success border-left-success" role="alert">
            {{ session('status') }}
        </div>
    @endif

    <div class="row">

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <a href="{{ route('developer.projects.index') }}" class="text-decoration-none">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">{{ __('Proyectos') }}
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $widget['projectsCount'] }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </a>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <a href="{{ route('developer.tasks.index') }}" class="text-decoration-none">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Tareas</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $widget['tasksCount'] }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="bi bi-list-task fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
            </a>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary  text-uppercase mb-1">Analistas</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $widget['analysts'] }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="bi bi-file-earmark-person fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <div class="row">

        <!-- Content Column -->
        <div class="col-lg-6 mb-4">

            <!-- Project Card Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Proyectos</h6>
                </div>
                <div class="card-body">
                    @foreach ($projects as $project)
                        <h4 class="small font-weight-bold">{{ $project->name }} <span
                                class="float-right">{{ $project->progress_percentage }}%</span></h4>
                        <div class="progress mb-4">
                            @php
                                $progressClass = '';
                                if ($project->progress_percentage <= 20) {
                                    $progressClass = 'bg-danger';
                                } elseif ($project->progress_percentage <= 40) {
                                    $progressClass = 'bg-warning';
                                } elseif ($project->progress_percentage <= 60) {
                                    $progressClass = '';
                                } elseif ($project->progress_percentage <= 80) {
                                    $progressClass = 'bg-info';
                                } else {
                                    $progressClass = 'bg-success';
                                }
                            @endphp
                            <div class="progress-bar {{ $progressClass }}" role="progressbar"
                                style="width: {{ $project->progress_percentage }}%"
                                aria-valuenow="{{ $project->progress_percentage }}" aria-valuemin="0" aria-valuemax="100">
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

        </div>

        <div class="col-lg-6 mb-4">

            <!-- Task Card Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Tareas</h6>
                </div>
                <div class="card-body">
                    @foreach ($tasks as $task)
                        <h4 class="small font-weight-bold">{{ $task->name }} <span
                                class="float-right">{{ $task->progress_percentage }}%</span></h4>
                        <div class="progress mb-4">
                            @php
                                $progressClass = '';
                                if ($task->progress_percentage <= 20) {
                                    $progressClass = 'bg-danger';
                                } elseif ($task->progress_percentage <= 40) {
                                    $progressClass = 'bg-warning';
                                } elseif ($task->progress_percentage <= 60) {
                                    $progressClass = '';
                                } elseif ($task->progress_percentage <= 80) {
                                    $progressClass = 'bg-info';
                                } else {
                                    $progressClass = 'bg-success';
                                }
                            @endphp
                            <div class="progress-bar {{ $progressClass }}" role="progressbar"
                                style="width: {{ $task->progress_percentage }}%"
                                aria-valuenow="{{ $task->progress_percentage }}" aria-valuemin="0" aria-valuemax="100">
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>


        </div>
    </div>
@endsection
