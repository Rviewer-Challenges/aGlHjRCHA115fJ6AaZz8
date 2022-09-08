@extends('layouts.default')

@section('content')
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
