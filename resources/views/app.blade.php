<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <script src="https://kit.fontawesome.com/176dc61361.js" crossorigin="anonymous"></script>

        <!-- Scripts -->
        <script src="{{ asset('vendor/layout-bvv-default/js/app.js') }}" defer></script>

        {{-- @livewireStyles --}}
    </head>
    <body class="bg-light">
        @include('layouts.navigation')

        <!-- Page Heading -->
        <header class="bg-white shadow-sm">
            <div class="container">
                <h1 class="py-4 fs-2">@yield('header')</h1>
            </div>
        </header>

        <!-- Page Content -->
        <main class="container px-4 py-3 mt-4 bg-white rounded shadow-sm">
            hallo Paket
            @yield('content')
        
            asdfasdf
            {{-- <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">


                <div class="mt-8 overflow-hidden bg-white shadow dark:bg-gray-800 sm:rounded-lg">
                    <div class="p-4">
                        @yield('content')
                    </div>
                    
                    @include('layouts.footer')
                </div>
            </div> --}}

        </main>
        
    </body>
    {{-- @livewireScripts --}}
</html>
