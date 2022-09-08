@extends('layouts.default')

@section('content')

    <div class="title_container">
        <p class="title_home">@lang('views.title_join')</p>
        <p class="subtitle_home">@lang('views.subtitle_join')</p>
    </div>

    <join-project-component auth="{{Auth::user()}}" project-id="{{$project_id}}" message="{{isset($message) ? $message : 0}}" status="{{isset($status) ? $status : 0}}"></join-project-component>

@endsection

