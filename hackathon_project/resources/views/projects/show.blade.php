@extends('layouts.default')

@section('content')

    <div class="main_container">

        <h1 class="title_project">{{$project->title}}</h1>

        <hr width="70%" color="#F9BE01">

        @if($project->current_team == $project->total_team)
            <h1 class="title_project">Equipo completo</h1>
        @else
            <h1 class="title_project">Sitios disponibles {{$project->current_team}} / {{$project->total_team}}</h1>

            <a class="container_right mt-6 mb-6" href="{{ route('join_project', $project->id) }}">
                <button class="btn_join">
                    UNIRME
                </button>
            </a>
        @endif

        <h3 class="description_title">Descripción</h3>
        <p class="description_project">{{$project->description}}</p>

        <h3 class="description_title">Proposito del proyecto</h3>
        <p class="description_project">{{$project->motivation}}</p>

        <h3 class="description_title">Requisitos para unirse al equipo</h3>
        <p class="description_project">{{$project->requirements}}</p>

        <h3 class="description_title">Tecnologías que se utilizan en el proyecto</h3>

        <div class="container_tags">
            @foreach ($project->categories as $category)
                <div class="custom_card_tag">
                    <span class="text_card_tag">{{$category->name}}</span>
                </div>
            @endforeach
        </div>

    </div>

@endsection

