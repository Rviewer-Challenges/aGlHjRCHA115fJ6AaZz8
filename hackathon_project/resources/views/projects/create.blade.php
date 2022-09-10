@extends('layouts.default')

@section('content')

    <div class="title_container">
        <p class="title_home">@lang('views.title_create')</p>
        <p class="subtitle_home">@lang('views.subtitle_create')</p>
    </div>

    <create-project-component loading={{isset($loading) ? $loading : 0}} categories="{{json_encode($categories)}}" auth="{{Auth::user()}}" message="{{isset($message) ? $message : 0}}" status="{{isset($status) ? $status : 0}}"></create-project-component>

@endsection

