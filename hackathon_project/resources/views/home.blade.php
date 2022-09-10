@extends('layouts.default')

@section('content')

    <div class="product_tour_container">
        <div class="product_tour_element" style="background: rgb(94, 155, 160);">
            <p class="title_tour color_white">¿Buscas experiencia en un proyecto real?</p>
            <p class="text_tour color_white"><strong>UNION TASK</strong> te permite trabajar en proyectos de otros desarrolladores de la comunidad, de forma gratuita.</p>
            <p class="text_tour color_white">Puedes unirte, o crear tu propio proyecto para que otros desarrolladores puedan unirse a tí y desarrollar una gran idea juntos.</p>
            <br>
            <p class="text_tour color_white">¿Quién sabe hasta dónde podeís llegar?</p>
        </div>
        <div class="product_tour_element" style="background: #F9BE01;">
            <p class="title_tour color_black">¿Tienes una idea en mente?</p>
            <p class="text_tour color_black">Crea un proyecto y explica con detalle de que trata tu idea, que necesitas, que tecnologías vas a trabajar... <br> <br> Exprésate para que las personas se interesen y quieran unirse a tu equipo para desarrollar el proyecto juntos. Selecciona a los profesionales que creas mas cualificados para tí.</p>
            <p class="text_tour color_black">¡Empieza a crear!</p>
        </div>
        <div class="product_tour_element" style="background: #F9BE01;">
            <p class="title_tour color_black">¿Te gustaría formar parte de una idea?</p>
            <p class="text_tour color_black">Busca un proyecto que se adecúe a tí. Puedes filtrar por tu lenguaje o framework favorito.</p>
            <p class="text_tour color_black">A continuación, envía la solicitud al jefe de proyecto para que pueda conocerte y ponerse en contacto contigo.</p>
            <br>
            <p class="text_tour color_black">¡Y empezad a trabajar juntos!</p>
        </div>
        <div class="product_tour_element" style="background: rgb(94, 155, 160);">
            <p class="title_tour color_white">¿A qué esperas? ¡Vámos!</p>
            <p class="text_tour color_white">Únete a la comunidad de <strong>UNION TASK</strong> y empieza a ser parte de las grandes ideas. Éste puede ser tu punto de partida ...</p>
        </div>
    </div>

    <search-component></search-component>

    <div class="title_container">
        <p class="title_home">@lang('views.title_home')</p>
        <p class="subtitle_home">@lang('views.subtitle_home')</p>
    </div>

    <list-projects-component pagination="0" api="{{url('/projects')}}"></list-projects-component>

    <div class="title_container">
        <p class="title_home">@lang('views.title2_home')</p>
    </div>

    <list-categories-component base-url="{{url('')}}"></list-categories-component>

@endsection
