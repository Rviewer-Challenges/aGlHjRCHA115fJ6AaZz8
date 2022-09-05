<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link href="https://cdn.jsdelivr.net/npm/@mdi/font@5.x/css/materialdesignicons.min.css" rel="stylesheet">
        <link href="{{ asset('css/main.css') }}" rel="stylesheet" type="text/css" >
        <link href="{{ asset('css/show_project.css') }}" rel="stylesheet" type="text/css" >
        <title>UNION TASK</title>
    </head>
    <body>

        <div id="app">
            <v-app app>
                <v-container style="width: 60%;">
                    <header-component></header-component>
                    @yield('content')
                </v-container>

                <footer-component></footer-component>
            </v-app>
        </div>

        <script src="{{ asset('js/app.js') }}"></script>
    </body>
</html>
