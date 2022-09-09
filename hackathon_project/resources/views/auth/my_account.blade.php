@extends('layouts.default')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Mi cuenta</div>

                <div class="card-body">
                    <div class="d-flex flex-column">
                        <button onclick="window.location='{{ url('/account/projects/' . $user_id) }}'" type="button" class="btn btn-light mb-4">Mis proyectos</button>
                        <button onclick="window.location='{{ url('/account/projects/registered/' . $user_id) }}'" type="button" class="btn btn-light mb-4">Proyectos inscritos</button>
                        <a href="{{url('/password/reset')}}" role="button" class="btn btn-info mt-5">Cambiar contraseña</a>
                        <a href="{{url('/logout')}}" role="button" class="btn btn-warning mt-5">Cerrar sesion</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
