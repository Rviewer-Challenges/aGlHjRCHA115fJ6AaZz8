@extends('layouts.default')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Proyectos a los que pertenezco
                </div>

                <div class="card-body">
                    <div class="d-flex flex-column">
                        @if (count($projects) > 0)
                            @foreach ($projects as $project)
                                <div class="card mb-4">
                                    <div class="card-body">
                                        <strong>{{$project->title}}</strong>

                                        <a href="{{url('/projects/'. $project->id)}}" class="ml-4">Ver</a>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <p>Aún no te han aceptado en ningun proyecto. ¡No te preocupes, pronto estarás en uno!</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
