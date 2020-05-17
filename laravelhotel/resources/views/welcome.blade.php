<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background: url('img/banner2.jpg') no-repeat;
                color: white;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
                background-attachment: fixed;
                background-size: cover;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
                color: white;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: white;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }

            div.transbox {
                width: 100%;
                height:100%;
                background-color: black;
                border: 1px solid black;
                opacity: 0.6;
                filter: alpha(opacity=60); /* For IE8 and earlier */
                
            }

            div.transbox p {
                margin: 5%;
                font-weight: bold;
                color: white;
            }
        </style>
    </head>
    <body>
    <div class="transbox">
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
            
                <div class="content">
                    <div class="title m-b-md">
                        Welcome To  Hotello
                    </div>

                    <div class="links">
                        <a href="#">Kamar</a>
                        <a href="#">Detail</a>
                        <a href="#">Fasilitas</a>
                        <a href="#">Login/Register</a>
                        <a href="#">Tentang Kami</a>
                        <!--a href="#">Forge</a>
                        <a href="#">Vapor</a>
                        <a href="#">GitHub</a-->
                    </div>
                </div>
            
        </div>
    </div>
    </body>
</html>
