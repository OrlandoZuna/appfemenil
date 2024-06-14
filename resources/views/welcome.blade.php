<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Femenil 2024</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #857e85;
                color: #ddd2d7;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
                background: rgb(221, 105, 225);
            }

            .position-ref {
                position: relative;
                background:rgb(215, 100, 232) ;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                margin-top: 5%;
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links{
                width: 100%;
                background: #7e12cb;
                margin-top: -1.8%;
                margin-right: -0.8%;
                height: 50px;
                
            }

            .links > a {
                float: right;
                color: #d4e5ed;
                padding: 18px 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
            .links > img{
                float: left;
                margin-left: 5%;
                text-align: center;
                padding: 6px;
            }

        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    <img src="{{{ asset('assets/images/uce_1.png') }}}" width="45px" id="logouce">
                    
                    @auth
                        <a href="{{ url('/perso') }}">Registros</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Registrarse</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    Retiro Feminil del Altiplano 2024
                </div>

                <div class="links" hidden>
                    <a href="https://laravel.com/docs">Docs</a>
                    <a href="https://laracasts.com">Laracasts</a>
                    <a href="https://laravel-news.com">News</a>
                    <a href="https://blog.laravel.com">Blog</a>
                    <a href="https://nova.laravel.com">Nova</a>
                    <a href="https://forge.laravel.com">Forge</a>
                    <a href="https://vapor.laravel.com">Vapor</a>
                    <a href="https://github.com/laravel/laravel">GitHub</a>
                </div>

                
                <div>

                <p>SE FIEL POR QUE DIOS ES FIEL</p>
                <P>Oseas 3:1</P>
                </div>
            </div>
        </div>
    </body>
</html>
