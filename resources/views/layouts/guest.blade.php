<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="{{ asset('assets/favicon/favicon.png') }}">
    <title>{{ config('app.name', 'WebRTC Transfer - login') }}</title>

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
</head>

<body class="d-flex flex-column">
    @vite([
        'resources/js/demo-theme.min.js'
    ])
    <div class="row g-0 flex-fill">
        <div class="col-12 col-lg-6 col-xl-4 border-top-wide border-primary d-flex flex-column justify-content-center">
            <div class="container container-tight my-5 px-lg-5">
                <div class="text-center navbar-brand-autodark mb-4">
                    <a href="." class="navbar-brand navbar-brand-image"><img src="{{ asset('assets/img/logo.svg') }}" height="100" alt="Logo"></a>
                </div>
                {{ $slot }}
            </div>
        </div>
        <div class="col-12 col-lg-6 col-xl-8 d-none d-lg-block">
            <!-- Photo -->
            <div class="bg-cover h-100 min-vh-100" style="background-image: url({{ asset('assets/img/login.jpg') }})"></div>
        </div>
    </div>
    @vite([
        'resources/js/tabler.min.js',
        'resources/js/demo.min.js'
    ])
    <script>
        document.querySelectorAll('input, select').forEach(function(input) {
            input.addEventListener('focus', function() {
                this.classList.remove('is-invalid');
                let feedback = this.nextElementSibling;
                if (feedback && feedback.classList.contains('invalid-feedback')) {
                    feedback.remove();
                }
            });
        });

        const quitClass = () => {
            let invalidFeedbacks = document.querySelectorAll('.invalid-feedback');
            invalidFeedbacks.forEach(feedback => feedback.remove());
        };
    </script>
</body>

</html>