@extends('layouts.default')

@section('content')

    <search-component></search-component>

    <div class="title_container">
        <p class="title_home">@lang('views.title_search', ['category' => $category])</p>
        <p class="subtitle_home">@lang('views.subtitle_search', ['category' => $category])</p>
    </div>

    <list-projects-component pagination="1" api="{{url('/search/api/' . $category)}}"></list-projects-component>

@endsection
