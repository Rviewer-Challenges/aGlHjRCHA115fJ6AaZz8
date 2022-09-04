@extends('layouts.default')

@section('content')
    <search-component></search-component>

    <div class="title_container">
        <p class="title_home">@lang('views.title_home')</p>
        <p class="subtitle_home">@lang('views.subtitle_home')</p>
    </div>

    <list-projects-component base-url="{{route('api.projects')}}"></list-projects-component>

    <div class="title_container">
        <p class="title_home">@lang('views.title2_home')</p>
    </div>

    <list-categories-component base-url="{{route('api.categories')}}"></list-categories-component>

@endsection
