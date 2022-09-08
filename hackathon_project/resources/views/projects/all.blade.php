@extends('layouts.default')

@section('content')

    <search-component></search-component>

    <div class="title_container">
        <p class="title_home">@lang('views.title_all_projects')</p>
        <p class="subtitle_home">@lang('views.subtitle_all_projects')</p>
    </div>

    <list-projects-component pagination="1" api="{{url('/all/api/projects')}}"></list-projects-component>

@endsection
