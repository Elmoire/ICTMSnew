<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>DSWD WEB</title>
        <link rel= "shortcut icon" type="image/png" href="{{('/Logo/logo.png')}}">

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- Styles -->
        <style>
            body {
                font-family: 'figtree', sans-serif;
                margin: 0;
                padding: 0;
                display: flex;
                flex-direction: column;
                min-height: 100vh;
                background-image: url(/logo/bg.png);
                background-size: cover;
                background-attachment: fixed;
                background-position:right;
            }
            header {
                display: flex;
                justify-content: space-between;
                align-items: center;
                padding: 10px 40px;
            }
            header img{
                margin:10px 10px;
            }
            nav {
                display: flex;
                gap: 10px;
                padding: 10px 50px;
                margin:0 10px;
            }
            nav a {
                text-decoration: none;
                color: white;
                padding: 8px 16px;
                border-radius: 4px;
                transition: background-color 0.3s, color 0.3s;
            }
            main {
                flex: 1;
                padding: 20px;
            }
            .text {
                display: flex;
                flex-direction: column;
                align-items: flex-start;
                margin-left:80px;
                margin-top:0;
                font-family:sans-serif;
            }
            .left-text {
                font-size: 25px;
                text-align: left;
                margin-bottom:30px;
            }
            .request {
                font-size: 4em;
                font-weight: bold;
                color: #29335c;
                }
            .use {
                font-size: 1em;
                font-weight: bold;
                color: #d91a13;
            }
            .buttons {
                display: flex;
                margin-top: 20px;
                margin-left: 0;
            }
            .buttons button{
                margin-right:25px;
            }
            .btn {
                background-color: #354e7d;
                color: #fff;
                padding: 20px;
                font-size:20px;
                border:none;
                border-radius: 40px;
                cursor: pointer;
                box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
                filter: drop-shadow(0 10px 10px rgba(0, 0, 0, 0.2));
                width: 230px;
            }
            .btn:hover {
                background-color: #02225d;
                color: white;
            }
        </style>
    </head>
    <body>
        <div>
            <div>
                <div>
                    <header>
                        <img width="250" src="{{asset('/logo/logo.jpg')}}" alt="logo">
                        @if (Route::has('login'))
                            <nav>
                                @auth
                                    <a href="{{ url('/dashboard') }}" class="rounded-md px-3 py-2 text-white ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20]">Dashboard</a>
                                @else
                                    <a href="{{ route('login') }}" class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20]">Log in</a>

{{--                                    @if (Route::has('register'))--}}
{{--                                        <a href="{{ route('register') }}" class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20]">Register</a>--}}
{{--                                    @endif--}}
                                @endauth
                            </nav>
                        @endif
                    </header>

                    <main class="mt-6">
                        <div class="container">
                            <div class="text">
                                <div class="left-text">
                                    <h1 class="request" style="margin-bottom:-10px;">Request<br>Of<span class="use"> Use</span></h1>
                                </div>
                                <div class="buttons">
                                    <x-nav-link href="{{ route('user-conference') }}">
                                        <button class="btn conference">
                                            {{ __('Conference Room') }}
                                        </button>
                                    </x-nav-link>
                                    <x-nav-link href="{{ route('user-vehicle') }}">
                                        <button class="btn vehicle">
                                            {{ __('Vehicle') }}
                                        </button>
                                    </x-nav-link>
                                </div>
                            </div>
                        </div>
                    </main>
                </div>
            </div>
        </div>
    </body>
</html>
