@extends('layouts.default')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Mis proyectos
                </div>

                <div class="card-body">
                    <div class="d-flex flex-column">
                        @if (count($projects) > 0)
                            @foreach ($projects as $project)
                                <div class="card mb-4">
                                    <div class="card-body">
                                        <strong>{{$project->title}}</strong>

                                        <a href="{{url('/projects/'. $project->id)}}" class="ml-4">Ver</a>
                                        <a href="{{url('/account/projects/team/' . $project->id)}}" class="ml-4">Mi equipo</a>
                                        <a href="{{url('/project/delete/' . $project->id)}}" onclick="return confirm('¿Estás seguro de eliminar este proyecto?')" class="ml-4">Eliminar</a>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <p>No tienes proyectos creados</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
