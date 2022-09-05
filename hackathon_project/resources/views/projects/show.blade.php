@extends('layouts.default')

@section('content')

    <div class="main_container">

        <h1 class="title_project">{{$project->title}}</h1>

        <hr width="70%" color="#F9BE01">

        <div class="container_team">
            <div class="container_left">
                <div class="text_team">Sitios disponibles {{$project->current_team}} / {{$project->total_team}}</div>
            </div>

            <div class="container_right">
                <button class="btn_join">UNIRME AL EQUIPO</button>
            </div>
        </div>

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

