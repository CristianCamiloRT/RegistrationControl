<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="{{ asset('assets/favicon/favicon.png') }}">
    <title>{{ config('app.name', 'WebRTC - Transfer') }}</title>

    @vite([
        'resources/js/app.js',
        'resources/css/tabler.min.css',
        'resources/css/demo.min.css'
    ])
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/tabler-icons.min.css" />

    <style>
        @import url('https://rsms.me/inter/inter.css');
        :root {
            --tblr-font-sans-serif: 'Inter Var', -apple-system, BlinkMacSystemFont, San Francisco, Segoe UI, Roboto, Helvetica Neue, sans-serif;
        }

        body {
            font-feature-settings: "cv03", "cv04", "cv11";
        }
    </style>

    @if (isset($head))
        {{ $head }}
    @endif
</head>
<body>
    @vite(['resources/js/demo-theme.min.js'])
    <div class="page">
        <!-- Navbar -->
        @include('sections.navbar')
        <div class="page-wrapper">
            <!-- Page header -->
            @if (isset($header))
                <div class="page-header d-print-none">
                    <div class="container-xl">
                        <div class="row g-2 align-items-center">
                            <div class="col">
                                @if (isset($pretitle))
                                    {{ $pretitle }}
                                @endif
                                @if (isset($title))
                                    {{ $title }}
                                @endif
                            </div>
                            <!-- Page title actions -->
                            <div class="col-auto ms-auto d-print-none">
                                <div class="btn-list">
                                    @if (isset($buttons))
                                        {{ $buttons }}
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
            <!-- Page body -->
            <div class="page-body">
                <div class="container-xl">
                    <div class="row row-cards">
                        {{ $slot }}
                    </div>
                </div>
            </div>
            <!-- Footer -->
            @include('sections.footer')
        </div>
    </div>
    @vite([
        'resources/js/tabler.min.js',
        'resources/js/demo.min.js'
    ])
</body>
</html>