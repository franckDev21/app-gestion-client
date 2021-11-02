<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">

        <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

    </head>
    <body class="antialiased">
        <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
            @if (Route::has('login'))
                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
                <div class="flex items-center justify-center pt-8 sm:justify-start sm:pt-0">
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="96pt" height="96pt" viewBox="0 0 96 96" version="1.1">
                        <defs>
                        <linearGradient id="linear0" gradientUnits="userSpaceOnUse" x1="32" y1="25.6667" x2="32" y2="53.3654" spreadMethod="reflect" gradientTransform="matrix(1.5,0,0,1.5,0,0)">
                        <stop offset="0" style="stop-color:#1A6DFF;stop-opacity:1;"/>
                        <stop offset="1" style="stop-color:#C822FF;stop-opacity:1;"/>
                        </linearGradient>
                        <linearGradient id="linear1" gradientUnits="userSpaceOnUse" x1="31.1465" y1="10.5" x2="31.1465" y2="29.8828" spreadMethod="reflect" gradientTransform="matrix(1.5,0,0,1.5,0,0)">
                        <stop offset="0" style="stop-color:#6DC7FF;stop-opacity:1;"/>
                        <stop offset="1" style="stop-color:#E6ABFF;stop-opacity:1;"/>
                        </linearGradient>
                        </defs>
                        <g id="surface1">
                        <path style=" stroke:none;fill-rule:nonzero;fill:url(#linear0);" d="M 82.5 76.5 L 82.5 45 L 79.5 45 L 79.5 76.5 L 73.5 76.5 L 73.5 39 L 70.5 39 L 70.5 76.5 L 64.5 76.5 L 64.5 49.5 L 61.5 49.5 L 61.5 76.5 L 52.5 76.5 L 52.5 55.5 L 49.5 55.5 L 49.5 76.5 L 43.5 76.5 L 43.5 63 L 40.5 63 L 40.5 76.5 L 34.5 76.5 L 34.5 45 L 31.5 45 L 31.5 76.5 L 25.5 76.5 L 25.5 69 L 22.5 69 L 22.5 76.5 L 16.5 76.5 L 16.5 63 L 13.5 63 L 13.5 76.5 L 9 76.5 L 9 79.5 L 87 79.5 L 87 76.5 Z "/>
                        <path style=" stroke:none;fill-rule:nonzero;fill:url(#linear1);" d="M 76.21875 16.597656 L 68.449219 18.75 C 67.492188 19.015625 67.175781 20.21875 67.882813 20.917969 L 70.421875 23.457031 L 54.179688 39.699219 C 52.425781 41.453125 49.574219 41.453125 47.820313 39.699219 L 38.300781 30.179688 C 35.378906 27.257813 30.621094 27.257813 27.699219 30.179688 L 13.941406 43.941406 L 16.058594 46.058594 L 29.820313 32.300781 C 31.574219 30.546875 34.425781 30.546875 36.179688 32.300781 L 45.699219 41.820313 C 48.621094 44.742188 53.378906 44.742188 56.300781 41.820313 L 72.542969 25.578125 L 75.082031 28.117188 C 75.785156 28.824219 76.984375 28.507813 77.25 27.546875 L 79.402344 19.78125 C 79.941406 17.84375 78.15625 16.058594 76.21875 16.597656 Z "/>
                        </g>
                      </svg>
                      <div class="h1 text-4xl  text-indigo-400 font-bold">Client Manager</div>
                </div>

                <div class="mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg">
                    
                </div>

                <div class="flex justify-center mt-4 sm:items-center sm:justify-between">
                    <div class="text-center text-sm text-gray-500 sm:text-left">
                        <div class="flex items-center">
                            <div class="text-lg">Franck Tiomela Mon github👉</div>
                            <i class="fab text-2xl ml-2 fa-github"></i>
                            <a href="https://github.com/franckDev21" class="ml-1 mr-2 underline">
                                github
                            </a>
                        </div>
                    </div>

                    <div class="ml-4 text-center text-sm text-gray-500 sm:text-right sm:ml-0">
                        Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
