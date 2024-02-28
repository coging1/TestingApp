<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        {{-- <meta charset="utf-8"> --}}
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        {{-- Volt CSS --}}
	      <link type="text/css" href="{{ asset('theme/volt.css') }}" rel="stylesheet">

	      {{-- Bootstrap icons --}}
	      <link type="text/css" href="{{ asset('vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">

        {{-- <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" /> --}}
        <!-- Scripts -->
        {{-- @vite(['resources/css/app.css', 'resources/js/app.js']) --}}
    </head>

    <body class="font-sans antialiased">
        {{-- <div class="min-h-screen bg-gray-100">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div> --}}

        @include('layouts.partials.sidebar')

	      <main class="content">
          {{-- navbar --}}
		      @include('layouts.partials.navbar')
		      {{-- page content --}}
		      {{ $slot }}
		      {{-- footer --}}
		      @include('layouts.partials.footer')
	      </main>

	      {{-- Core --}}
	      <script src="{{ asset('vendor/@popperjs/popper.min.js') }}"></script>
	      <script src="{{ asset('vendor/bootstrap/bootstrap.min.js') }}"></script>
	      {{-- Smooth scroll --}}
	      <script src="{{ asset('vendor/smooth-scroll/smooth-scroll.min.js') }}"></script>
	      {{-- Volt JS --}}
	      <script src="{{ asset('theme/volt.js') }}"></script>

    </body>
</html>
