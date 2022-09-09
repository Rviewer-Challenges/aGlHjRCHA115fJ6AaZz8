@extends('layouts.default')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Mi equipo
                </div>

                <div class="card-body">
                    <div class="d-flex flex-column">
                        @if (count($users) > 0)
                            @foreach ($users as $user)
                                <div class="card mb-4">
                                    <div class="card-body">
                                        <strong>{{$user->name}}</strong>

                                        @if($user->verified == 1)
                                            <a href="{{url('/account/change/user/' . $user->id . '/0/' . $project_id )}}" onclick="return confirm('¿Estás seguro de desactivar a este usuario?')" class="ml-4">Desactivar usuario</a>
                                        @else
                                            @if($project->current_team == $project->total_team)
                                                <p>Equipo completo. Este usuario no puedo entrar al equipo.</p>
                                            @else
                                                <a href="{{url('/account/change/user/' . $user->id . '/1/' . $project_id )}}" onclick="return confirm('¿Estás seguro de activar a este usuario?')" class="ml-4">Activar usuario</a>
                                            @endif
                                        @endif

                                    </div>
                                </div>
                            @endforeach
                        @else
                            <p>No tienes un equipo</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
