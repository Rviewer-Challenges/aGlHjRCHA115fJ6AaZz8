<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link href="https://cdn.jsdelivr.net/npm/@mdi/font@5.x/css/materialdesignicons.min.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
        <link href="{{ asset('css/main.css') }}" rel="stylesheet" type="text/css" >
        <link href="{{ asset('css/show_project.css') }}" rel="stylesheet" type="text/css" >
        <link rel="icon" href="{{url('/images/logo_uniontask.png')}}">
        <title>UNION TASK</title>
    </head>
    <body>

        <div id="app">
            <v-app app>
                <v-container style="width: 60%;">
                    <header-component auth="{{Auth::user()}}"></header-component>
                    @yield('content')
                </v-container>

                <footer-component></footer-component>
            </v-app>
        </div>

        <script src="{{ asset('js/app.js') }}"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
    </body>
</html>
