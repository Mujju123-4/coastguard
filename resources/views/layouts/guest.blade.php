<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('images/logo.png') }}">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Tailwind CSS CDN (includes Forms plugin) -->
    <script src="https://cdn.tailwindcss.com?plugins=forms"></script>

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Figtree', 'ui-sans-serif', 'system-ui', 'sans-serif', "Apple Color Emoji",
                            "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji"
                        ],
                    },
                    keyframes: {
                        'pan-image': {
                            '0%': {
                                transform: 'scale(1) translate(0, 0)'
                            },
                            '100%': {
                                transform: 'scale(1.1) translate(-2%, -2%)'
                            },
                        }
                    },
                    animation: {
                        'pan-image': 'pan-image 40s linear infinite alternate',
                    },
                },
            },
        }
    </script>
<<<<<<< HEAD

    <!-- Alpine.js CDN -->
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <!-- Axios CDN & Setup -->
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script>
        window.axios = axios;
        window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
    </script>
</head>

<body class="font-sans text-gray-900 antialiased">
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 relative overflow-hidden">
        <!-- Animated Background Image -->
        <div class="absolute inset-0 w-full h-full z-0 overflow-hidden bg-slate-900">
            <img src="{{ asset('images/bg.png') }}"
                class="absolute inset-0 w-full h-full object-cover animate-pan-image opacity-80"
                alt="Indian Coast Guard Ship">
        </div>

        <!-- Dark overlay for better text contrast -->
        <div class="absolute inset-0 bg-slate-900/60 mix-blend-multiply z-0"></div>
        <div class="absolute inset-0 bg-gradient-to-t from-slate-900/80 via-transparent to-transparent z-0"></div>

        <div
            class="relative z-10 w-full sm:max-w-lg mt-6 px-10 py-12 bg-white/10 backdrop-blur-xl border border-white/20 shadow-[-10px_-10px_30px_4px_rgba(0,0,0,0.1),_10px_10px_30px_4px_rgba(45,78,255,0.15)] overflow-hidden sm:rounded-3xl">
            <div class="flex flex-col items-center justify-center mb-8 text-center">
                <div class="flex items-center justify-center gap-8 mb-4">
                    <a class="transition-transform hover:scale-105 duration-300">
                        <img src="{{ asset('images/icg-logo.png') }}" alt="Indian Coast Guard Logo"
                            class="h-24 w-auto drop-shadow-2xl">
                    </a>
                    @if (request()->routeIs('login'))
                        <div class="h-16 w-px bg-white/20 mx-2"></div>
                        <img src="{{ asset('images/LAMOR LOGO1.png') }}" alt="LAMOR Logo"
                            class="h-20 w-auto drop-shadow-2xl">
                    @endif
                </div>

                <h5 class="mt-2 font-bold text-white tracking-widest uppercase text-xs sm:text-sm opactiy-90">Online
                    Inventory Management System 1.0</h5>
                <h1 class="mt-1 font-black text-white tracking-[0.2em] uppercase text-xl sm:text-2xl">Indian Coast Guard
                </h1>
                <p class="text-[10px] sm:text-xs text-orange-400 mt-2 uppercase tracking-[0.3em] font-bold">Vayam
                    Rakshamah</p>
            </div>

            {{ $slot }}
        </div>
=======

    <!-- Alpine.js CDN -->
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <!-- Axios CDN & Setup -->
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script>
        window.axios = axios;
        window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
    </script>
</head>

<body class="font-sans text-gray-900 antialiased">
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 relative overflow-hidden">
        <!-- Animated Background Image -->
        <div class="absolute inset-0 w-full h-full z-0 overflow-hidden bg-slate-900">
            <img src="{{ asset('images/bg.png') }}"
                class="absolute inset-0 w-full h-full object-cover animate-pan-image opacity-80"
                alt="Indian Coast Guard Ship">
        </div>

        <!-- Dark overlay for better text contrast -->
        <div class="absolute inset-0 bg-slate-900/60 mix-blend-multiply z-0"></div>
        <div class="absolute inset-0 bg-gradient-to-t from-slate-900/80 via-transparent to-transparent z-0"></div>

        <div
            class="relative z-10 w-full sm:max-w-lg mt-6 px-10 py-12 bg-white/10 backdrop-blur-xl border border-white/20 shadow-[-10px_-10px_30px_4px_rgba(0,0,0,0.1),_10px_10px_30px_4px_rgba(45,78,255,0.15)] overflow-hidden sm:rounded-3xl">
            <div class="flex flex-col items-center justify-center mb-8">
                <a href="/" class="flex justify-center transition-transform hover:scale-105 duration-300">
                    <img src="{{ asset('images/icg-logo.png') }}" alt="Indian Coast Guard Logo"
                        class="h-28 w-auto drop-shadow-2xl mb-2">
                </a>
                <h5 class="mt-4  font-bold text-white tracking-widest uppercase">Online Inventory Management System 1.0
                    </h2>
                    <h1 class="mt-4 font-bold text-white tracking-widest uppercase">Indian Coast Guard</h1>

                    <p class="text-sm text-gray-300 mt-1 uppercase tracking-wider font-semibold">Vayam Rakshamah</p>
            </div>

            {{ $slot }}
        </div>
>>>>>>> 89a3400d8febfa7c0af4cd0221386851a7d4c933
    </div>
</body>

</html>
