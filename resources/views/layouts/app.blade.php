<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        
        <!-- Favicon -->
        <link rel="icon" type="image/png" href="{{ asset('images/logo.png') }}">
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-slate-50 flex">
            <!-- Sidebar -->
            <aside class="w-64 bg-slate-900 shadow-xl hidden sm:flex flex-col text-white relative z-20">
                <div class="h-16 flex items-center px-6 border-b border-white/10">
                    <img src="{{ asset('images/logo.png') }}" class="w-8 h-8 mr-3" alt="ICG Logo">
                    <span class="text-lg font-bold tracking-wider uppercase">ICG Admin</span>
                </div>
                <nav class="flex-1 px-4 py-8 space-y-2">
                    <a href="{{ route('dashboard') }}" class="flex items-center px-4 py-3 {{ request()->routeIs('dashboard') ? 'bg-orange-600/20 text-orange-400 border border-orange-500/30' : 'text-slate-300 hover:bg-white/5 hover:text-white' }} rounded-lg transition-colors">
                        <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
                        Overview
                    </a>
                    
                    @can('view users')
                    <a href="{{ route('users.index') }}" class="flex items-center px-4 py-3 {{ request()->routeIs('users.*') ? 'bg-orange-600/20 text-orange-400 border border-orange-500/30' : 'text-slate-300 hover:bg-white/5 hover:text-white' }} rounded-lg transition-colors">
                        <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                        Users
                    </a>
                    @endcan

                    @can('view roles')
                    <a href="{{ route('roles.index') }}" class="flex items-center px-4 py-3 {{ request()->routeIs('roles.*') ? 'bg-orange-600/20 text-orange-400 border border-orange-500/30' : 'text-slate-300 hover:bg-white/5 hover:text-white' }} rounded-lg transition-colors">
                        <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg>
                        Roles
                    </a>
                    @endcan

                    @can('view permissions')
                    <a href="{{ route('permissions.index') }}" class="flex items-center px-4 py-3 {{ request()->routeIs('permissions.*') ? 'bg-orange-600/20 text-orange-400 border border-orange-500/30' : 'text-slate-300 hover:bg-white/5 hover:text-white' }} rounded-lg transition-colors">
                        <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z"></path></svg>
                        Permissions
                    </a>
                    @endcan

                    @can('view locations')
                    <a href="{{ route('locations.index') }}" class="flex items-center px-4 py-3 {{ request()->routeIs('locations.*') ? 'bg-orange-600/20 text-orange-400 border border-orange-500/30' : 'text-slate-300 hover:bg-white/5 hover:text-white' }} rounded-lg transition-colors">
                        <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                        Locations
                    </a>
                    @endcan

                    @can('view notices')
                    <a href="{{ route('notices.index') }}" class="flex items-center px-4 py-3 {{ request()->routeIs('notices.*') ? 'bg-orange-600/20 text-orange-400 border border-orange-500/30' : 'text-slate-300 hover:bg-white/5 hover:text-white' }} rounded-lg transition-colors">
                        <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
                        </svg>
                        Notice Master
                    </a>
                    @endcan
                    
                    <a href="{{ route('profile.edit') }}" class="flex items-center px-4 py-3 {{ request()->routeIs('profile.edit') ? 'bg-orange-600/20 text-orange-400 border border-orange-500/30' : 'text-slate-300 hover:bg-white/5 hover:text-white' }} rounded-lg transition-colors">
                        <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                        My Profile
                    </a>
                </nav>
                <div class="px-4 py-6 border-t border-white/10">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="flex items-center w-full px-4 py-3 text-slate-300 hover:bg-rose-500/10 hover:text-rose-400 rounded-lg transition-colors">
                            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
                            Secure Logout
                        </button>
                    </form>
                </div>
            </aside>

            <!-- Main Content Area -->
            <div class="flex-1 flex flex-col overflow-hidden">
                <!-- Top Header -->
                <header class="h-16 bg-white shadow-sm flex items-center justify-between px-8 z-10 border-b border-slate-200">
                    <div class="flex items-center">
                        <h1 class="text-xl font-bold text-slate-800 tracking-tight">Command Center</h1>
                    </div>
                    <div class="flex items-center space-x-5">
                        <button class="text-slate-400 hover:text-orange-500 transition-colors">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path></svg>
                        </button>
                        <div class="h-8 w-px bg-slate-200"></div>
                        <div class="flex items-center space-x-3 cursor-pointer">
                            <div class="text-sm font-medium text-slate-600">{{ Auth::user()->name }}</div>
                            <div class="h-9 w-9 rounded-full bg-slate-800 border-2 border-orange-500 flex items-center justify-center text-white font-bold shadow-sm">
                                {{ substr(Auth::user()->name, 0, 1) }}
                            </div>
                        </div>
                    </div>
                </header>

                <!-- Page Content -->
                <main class="flex-1 overflow-x-hidden overflow-y-auto bg-slate-50/50 p-8">
                    @if (session('success'))
                        <div class="max-w-7xl mx-auto mb-6">
                            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                                <span class="block sm:inline">{{ session('success') }}</span>
                            </div>
                        </div>
                    @endif

                    @if (session('error'))
                        <div class="max-w-7xl mx-auto mb-6">
                            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                                <span class="block sm:inline">{{ session('error') }}</span>
                            </div>
                        </div>
                    @endif

                    {{ $slot }}
                </main>
            </div>
        </div>
    </body>
</html>
