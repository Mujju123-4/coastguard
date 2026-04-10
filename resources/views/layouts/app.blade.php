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

        <!-- Tailwind CSS CDN (includes Forms plugin) -->
        <script src="https://cdn.tailwindcss.com?plugins=forms"></script>
        
        <script>
            tailwind.config = {
                theme: {
                    extend: {
                        fontFamily: {
                            sans: ['Figtree', 'ui-sans-serif', 'system-ui', 'sans-serif', "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji"],
                        },
                        keyframes: {
                            'pan-image': {
                                '0%': { transform: 'scale(1) translate(0, 0)' },
                                '100%': { transform: 'scale(1.1) translate(-2%, -2%)' },
                            }
                        },
                        animation: {
                            'pan-image': 'pan-image 40s linear infinite alternate',
                        },
                    },
                },
            }
        </script>

        <!-- Alpine.js CDN -->
        <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
        
        <!-- Axios CDN & Setup -->
        <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
        <script>
            window.axios = axios;
            window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
        </script>
        
        <!-- Favicon -->
        <link rel="icon" type="image/png" href="{{ asset('images/logo.png') }}">
        
        @stack('styles')
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

                    @can('view item masters')
                    <a href="{{ route('item-masters.index') }}" class="flex items-center px-4 py-3 {{ request()->routeIs('item-masters.*') ? 'bg-orange-600/20 text-orange-400 border border-orange-500/30' : 'text-slate-300 hover:bg-white/5 hover:text-white' }} rounded-lg transition-colors">
                        <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                        </svg>
                        Item Master
                    </a>
                    @endcan

                     
                    
                 
                    
                    <a href="{{ route('user-manuals.index') }}" class="flex items-center px-4 py-3 {{ request()->routeIs('user-manuals.*') ? 'bg-orange-600/20 text-orange-400 border border-orange-500/30' : 'text-slate-300 hover:bg-white/5 hover:text-white' }} rounded-lg transition-colors">
                        <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                        </svg>
                        User Manuals
                    </a>

          
                    

                    <div class="pt-4"></div>
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
                <header class="h-16 bg-white shadow-sm flex items-center justify-between px-8 z-10 border-b border-slate-200" style="position:relative;">
                    <div class="flex items-center">
                        <h1 class="text-xl font-bold text-slate-800 tracking-tight">Command Center</h1>
                    </div>
                    <div class="flex items-center space-x-3">
                        {{-- Notification bell (functional) — rendered by the block below @stack('scripts') --}}
                        <div id="notif-bell-slot"></div>
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

        @stack('scripts')

    {{-- ===== TICKET NOTIFICATION MODAL ===== --}}
    <style>
        /* ── Filter bar pills ───────────────────────────────────────── */
        .tm-date-pill {
            padding:2px 8px; border-radius:999px; font-size:0.58rem; font-weight:700;
            border:1px solid rgba(255,255,255,0.1); background:transparent; color:#475569;
            cursor:pointer; transition:all 0.15s; white-space:nowrap;
        }
        .tm-date-pill:hover { background:rgba(255,255,255,0.06); color:#94a3b8; }
        .tm-date-pill.active { background:rgba(234,88,12,0.25); color:#fb923c; border-color:rgba(234,88,12,0.5); }
        /* ── Filter select dark style ─────────────────────────────── */
        #tm-filter-location option, #tm-filter-status option, #tm-filter-priority option {
            background:#1e293b; color:#cbd5e1;
        }
        /* ── Bell ─────────────────────────────────────────────────────── */
        #notif-wrapper { position:relative; display:inline-flex; align-items:center; }
        #notif-bell {
            position:relative; width:2.5rem; height:2.5rem;
            display:flex; align-items:center; justify-content:center;
            border:none; background:transparent; border-radius:0.75rem;
            cursor:pointer; color:#94a3b8; transition:all 0.2s;
        }
        #notif-bell:hover { background:#fff7ed; color:#ea580c; }
        #notif-bell.has-unread { color:#ea580c; }
        #notif-badge {
            position:absolute; top:-4px; right:-4px;
            min-width:1.2rem; height:1.2rem; padding:0 4px;
            background:#dc2626; color:#fff; font-size:0.6rem; font-weight:800;
            border-radius:999px; display:none; align-items:center; justify-content:center;
            border:2.5px solid #fff; line-height:1;
            animation:badgePop 0.35s cubic-bezier(.36,1.6,.64,1);
        }
        @keyframes badgePop { 0%{transform:scale(0)} 80%{transform:scale(1.3)} 100%{transform:scale(1)} }
        /* ── filterActive bell tint ──────────────────────────────── */
        #notif-bell.filter-active { outline:2px solid #fb923c; outline-offset:2px; border-radius:0.75rem; }
        @keyframes replyPulse {
            0%,100%{opacity:1;transform:scale(1)}
            50%{opacity:.7;transform:scale(1.08)}
        }
        @keyframes bellRing {
            0%,100%{transform:rotate(0)}
            10%,30%,50%{transform:rotate(13deg)}
            20%,40%,60%{transform:rotate(-13deg)}
            70%{transform:rotate(6deg)} 80%{transform:rotate(-5deg)}
        }
        #notif-bell.ringing svg { animation:bellRing 0.75s ease; }

        /* ── Modal overlay ─────────────────────────────────────────────── */
        #tm-overlay {
            display:none; position:fixed; inset:0; z-index:9999;
            background:rgba(2,6,23,0.65); backdrop-filter:blur(6px);
            -webkit-backdrop-filter:blur(6px);
            align-items:center; justify-content:center; padding:1rem;
        }
        #tm-overlay.open { display:flex; }

        /* ── Modal shell ───────────────────────────────────────────────── */
        #tm-modal {
            width:100%; max-width:910px; height:88vh; max-height:720px;
            background:#fff; border-radius:1.75rem;
            box-shadow:0 40px 120px rgba(2,6,23,.45), 0 8px 32px rgba(2,6,23,.25);
            display:flex; flex-direction:column; overflow:hidden;
            transform:scale(0.93) translateY(18px); opacity:0;
            transition:transform 0.28s cubic-bezier(.34,1.56,.64,1), opacity 0.22s ease;
        }
        #tm-overlay.open #tm-modal { transform:scale(1) translateY(0); opacity:1; }

        /* ── Modal header ──────────────────────────────────────────────── */
        #tm-header {
            display:flex; align-items:center; justify-content:space-between;
            padding:1.1rem 1.5rem; background:#0f172a; flex-shrink:0;
        }
        #tm-close {
            width:2rem; height:2rem; border:none; background:rgba(255,255,255,0.08);
            color:#94a3b8; border-radius:0.5rem; cursor:pointer; display:flex;
            align-items:center; justify-content:center; transition:all 0.15s; flex-shrink:0;
        }
        #tm-close:hover { background:rgba(255,255,255,0.16); color:#f1f5f9; }

        /* ── Two-column body ───────────────────────────────────────────── */
        #tm-body { display:flex; flex:1; min-height:0; }

        /* ── Left sidebar — ticket list ────────────────────────────────── */
        #tm-sidebar {
            width:300px; flex-shrink:0;
            background:#0f172a; border-right:1px solid rgba(255,255,255,0.06);
            display:flex; flex-direction:column;
        }
        #tm-sidebar-header {
            padding:0.875rem 1rem; border-bottom:1px solid rgba(255,255,255,0.06);
            display:flex; align-items:center; justify-content:space-between; flex-shrink:0;
        }
        #tm-list {
            flex:1; overflow-y:auto; scrollbar-width:thin; scrollbar-color:#334155 transparent;
        }
        #tm-list::-webkit-scrollbar { width:4px; }
        #tm-list::-webkit-scrollbar-thumb { background:#334155; border-radius:2px; }
        .tm-ticket-row {
            padding:0.875rem 1rem; border-bottom:1px solid rgba(255,255,255,0.05);
            cursor:pointer; transition:background 0.15s; display:flex; gap:0.625rem;
        }
        .tm-ticket-row:hover { background:rgba(255,255,255,0.05); }
        .tm-ticket-row.active { background:rgba(234,88,12,0.15); border-left:3px solid #ea580c; }
        .tm-dot { width:8px; height:8px; border-radius:50%; flex-shrink:0; margin-top:5px; }

        /* ── Right panel — chat / empty state ──────────────────────────── */
        #tm-main {
            flex:1; display:flex; flex-direction:column; background:#f8fafc; min-width:0;
        }

        /* Chat header */
        #tm-chat-header {
            padding:0.875rem 1.25rem; background:#fff;
            border-bottom:1px solid #f1f5f9; flex-shrink:0;
            display:none; align-items:center; gap:0.75rem;
        }

        /* Admin user card */
        #tm-user-card {
            display:none; padding:0.6rem 1.25rem; background:#fffbeb;
            border-bottom:1px solid #fef3c7; flex-shrink:0;
        }

        /* Chat messages */
        #tm-messages {
            flex:1; overflow-y:auto; padding:1rem 1.25rem;
            display:flex; flex-direction:column; gap:0.65rem;
            scrollbar-width:thin; scrollbar-color:#e2e8f0 transparent;
        }
        #tm-messages::-webkit-scrollbar { width:4px; }
        #tm-messages::-webkit-scrollbar-thumb { background:#e2e8f0; border-radius:2px; }

        /* Reply input bar */
        #tm-reply-bar {
            display:none; padding:0.75rem 1.25rem;
            border-top:1px solid #f1f5f9; background:#fff; flex-shrink:0;
            align-items:flex-end; gap:0.625rem;
        }
        #tm-reply-input {
            flex:1; padding:0.65rem 1rem; background:#f8fafc;
            border:1.5px solid #e2e8f0; border-radius:0.875rem;
            font-size:0.85rem; color:#1e293b; resize:none; font-family:inherit;
            transition:border 0.15s;
        }
        #tm-reply-input:focus { outline:none; border-color:#fb923c; background:#fff; }
        #tm-send-btn {
            padding:0.65rem 1.1rem; background:#16a34a; color:#fff;
            border:none; border-radius:0.875rem; font-size:0.8rem; font-weight:700;
            cursor:pointer; white-space:nowrap; transition:all 0.15s; flex-shrink:0;
        }
        #tm-send-btn:hover { background:#15803d; }
        #tm-send-btn:disabled { opacity:0.5; cursor:not-allowed; }

        /* Chat bubbles */
        .cb { max-width:72%; padding:0.6rem 0.9rem; font-size:0.82rem; line-height:1.5; word-break:break-word; border-radius:1rem; }
        .cb.mine  { background:#0f172a; color:#f1f5f9; border-radius:1rem 1rem 0.15rem 1rem; margin-left:auto; }
        .cb.theirs{ background:#fff; color:#1e293b; border-radius:1rem 1rem 1rem 0.15rem; border:1px solid #e2e8f0; }
        .cb.admin-msg { background:#fff7ed; color:#9a3412; border:1px solid #fed7aa; }
        .cb-meta { font-size:0.62rem; color:#94a3b8; margin-top:3px; display:flex; align-items:center; gap:4px; }
        .cb-meta.right { justify-content:flex-end; }
        .admin-badge { font-size:0.55rem; font-weight:700; background:#ea580c; color:#fff; padding:1px 5px; border-radius:999px; }

        /* Status bar */
        #tm-status { padding:0.4rem 1.25rem; background:#f8fafc; border-top:1px solid #f1f5f9; flex-shrink:0; }

        /* Empty state */
        #tm-empty-state { flex:1; display:flex; flex-direction:column; align-items:center; justify-content:center; gap:0.75rem; color:#94a3b8; text-align:center; padding:2rem; }

        /* Footer of sidebar */
        #tm-sidebar-footer { padding:0.6rem 1rem; border-top:1px solid rgba(255,255,255,0.06); flex-shrink:0; }
    </style>

    {{-- ── Bell button (moved into header slot by JS) ── --}}
    <div id="notif-wrapper">
        <button id="notif-bell" title="Ticket notifications" onclick="openNotifModal()">
            <svg style="width:1.4rem;height:1.4rem;" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round"
                      d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"/>
            </svg>
            <span id="notif-badge">0</span>
        </button>
    </div>

    {{-- ── Large modal panel ── --}}
    <div id="tm-overlay">
        <div id="tm-modal" role="dialog" aria-label="Ticket notifications">

            {{-- Modal header --}}
            <div id="tm-header">
                <div style="display:flex;align-items:center;gap:0.75rem;">
                    <div style="width:2.25rem;height:2.25rem;border-radius:0.625rem;background:rgba(234,88,12,.2);display:flex;align-items:center;justify-content:center;flex-shrink:0;">
                        <svg style="width:1.1rem;height:1.1rem;color:#fb923c;" fill="none" stroke="currentColor" stroke-width="2.2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"/>
                        </svg>
                    </div>
                    <div>
                        <p style="font-size:1rem;font-weight:800;color:#f1f5f9;margin:0;letter-spacing:-.02em;">Ticket Notifications</p>
                        <p style="font-size:0.7rem;color:#64748b;margin:0;">
                            <span id="tm-header-sub">Click a ticket to view & reply</span>
                        </p>
                    </div>
                    <span id="tm-new-badge" style="display:none;margin-left:0.5rem;font-size:0.65rem;font-weight:800;background:#dc2626;color:#fff;padding:2px 10px;border-radius:999px;"></span>
                </div>
                <div style="display:flex;align-items:center;gap:0.5rem;">
                    <button onclick="markAllSeen()" style="font-size:0.72rem;color:#64748b;border:1px solid rgba(255,255,255,0.1);background:rgba(255,255,255,0.06);padding:5px 12px;border-radius:0.5rem;cursor:pointer;transition:all 0.15s;"
                            onmouseover="this.style.background='rgba(255,255,255,0.12)'" onmouseout="this.style.background='rgba(255,255,255,0.06)'">
                        ✓ Mark all read
                    </button>
                    <button id="tm-close" onclick="closeNotifModal()" title="Close (Esc)">
                        <svg style="width:.9rem;height:.9rem;" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                    </button>
                </div>
            </div>

            {{-- Modal body --}}
            <div id="tm-body">

                {{-- ── LEFT: Ticket list sidebar ── --}}
                <div id="tm-sidebar">

                    {{-- ── Filter Bar ── --}}
                    <div id="tm-filter-bar" style="padding:0.6rem 0.75rem;border-bottom:1px solid rgba(255,255,255,0.06);background:#0a1120;flex-shrink:0;">

                        {{-- Row 1: Date pills --}}
                        <div style="display:flex;align-items:center;gap:0.3rem;margin-bottom:0.45rem;">
                            <span style="font-size:0.55rem;font-weight:700;color:#475569;text-transform:uppercase;letter-spacing:.08em;flex-shrink:0;margin-right:2px;">Date</span>
                            <button class="tm-date-pill active" data-val="all"   onclick="tmSetDate(this)">All</button>
                            <button class="tm-date-pill"        data-val="today" onclick="tmSetDate(this)">Today</button>
                            <button class="tm-date-pill"        data-val="7d"    onclick="tmSetDate(this)">7d</button>
                            <button class="tm-date-pill"        data-val="30d"   onclick="tmSetDate(this)">30d</button>
                            <button class="tm-date-pill"        data-val="custom" onclick="tmSetDate(this)">Custom</button>
                            
                            <button id="tm-filter-unread-btn" onclick="tmToggleUnread(this)" 
                                    style="margin-left:auto;font-size:0.62rem;font-weight:800;color:#16a34a;background:rgba(22,163,74,0.1);border:1px solid rgba(22,163,74,0.15);padding:3px 9px;border-radius:999px;cursor:pointer;transition:all 0.2s;">
                                🔔 Unread
                            </button>
                        </div>

                        {{-- Row 1.5: Custom Date Inputs (only when 'Custom' selected) --}}
                        <div id="tm-custom-date" style="display:none; gap:0.35rem; align-items:center; margin-bottom:0.45rem;">
                            <input type="date" id="tm-filter-date-from" onchange="tmApplyFilters()" style="flex:1;font-size:0.62rem;padding:3px 6px;border-radius:6px;border:1px solid rgba(255,255,255,0.1);background:#1e293b;color:#94a3b8;outline:none;">
                            <span style="color:#475569;font-size:0.62rem;">to</span>
                            <input type="date" id="tm-filter-date-to" onchange="tmApplyFilters()" style="flex:1;font-size:0.62rem;padding:3px 6px;border-radius:6px;border:1px solid rgba(255,255,255,0.1);background:#1e293b;color:#94a3b8;outline:none;">
                        </div>

                        {{-- Row 2: Location (admin only) + Status --}}
                        <div style="display:flex;gap:0.35rem;align-items:center;">
                            <select id="tm-filter-location" onchange="tmApplyFilters()" style="flex:1;font-size:0.62rem;padding:3px 6px;border-radius:6px;border:1px solid rgba(255,255,255,0.1);background:#1e293b;color:#94a3b8;outline:none;min-width:0;">
                                <option value="">All Locations</option>
                            </select>
                            <select id="tm-filter-status" onchange="tmApplyFilters()" style="font-size:0.62rem;padding:3px 6px;border-radius:6px;border:1px solid rgba(255,255,255,0.1);background:#1e293b;color:#94a3b8;outline:none;flex-shrink:0;">
                                <option value="all">All Status</option>
                                <option value="open">Open</option>
                                <option value="closed">Closed</option>
                            </select>
                            <select id="tm-filter-priority" onchange="tmApplyFilters()" style="font-size:0.62rem;padding:3px 6px;border-radius:6px;border:1px solid rgba(255,255,255,0.1);background:#1e293b;color:#94a3b8;outline:none;flex-shrink:0;">
                                <option value="">All Priority</option>
                                <option value="critical">🔴 Critical</option>
                                <option value="high">🟠 High</option>
                                <option value="medium">🟡 Medium</option>
                                <option value="low">🟢 Low</option>
                            </select>
                        </div>

                        {{-- Row 3: Active filter count + Reset --}}
                        <div style="display:flex;align-items:center;justify-content:space-between;margin-top:0.4rem;">
                            <span id="tm-filter-active-label" style="font-size:0.58rem;color:#64748b;">No active filters</span>
                            <button id="tm-filter-reset" onclick="tmResetFilters()" style="display:none;font-size:0.58rem;font-weight:700;color:#fb923c;background:rgba(234,88,12,0.1);border:1px solid rgba(234,88,12,0.2);border-radius:4px;padding:2px 7px;cursor:pointer;transition:all 0.15s;" onmouseover="this.style.background='rgba(234,88,12,0.2)'" onmouseout="this.style.background='rgba(234,88,12,0.1)'">✕ Reset</button>
                        </div>
                    </div>

                    {{-- ── Conversations header ── --}}
                    <div id="tm-sidebar-header">
                        <p style="font-size:0.7rem;font-weight:700;color:#475569;text-transform:uppercase;letter-spacing:.1em;margin:0;">Conversations</p>
                        <span id="tm-count-pill" style="font-size:0.62rem;font-weight:700;background:rgba(234,88,12,.2);color:#fb923c;padding:2px 8px;border-radius:999px;display:none;"></span>
                    </div>

                    <div id="tm-list">
                        <div id="tm-list-empty" style="padding:2.5rem 1rem;text-align:center;">
                            <svg style="width:2.5rem;height:2.5rem;margin:0 auto 0.75rem;color:#334155;" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h3.75M9 15h3.75M9 18h3.75m3 .75H18a2.25 2.25 0 002.25-2.25V6.108c0-1.135-.845-2.098-1.976-2.192a48.424 48.424 0 00-1.123-.08m-5.801 0c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 00.75-.75 2.25 2.25 0 00-.1-.664m-5.8 0A2.251 2.251 0 0113.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m0 0H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V9.375c0-.621-.504-1.125-1.125-1.125H8.25z"/>
                            </svg>
                            <p style="font-size:0.78rem;color:#475569;margin:0;">No tickets match filters</p>
                        </div>
                    </div>

                    <div id="tm-sidebar-footer">
                        <p id="tm-last-updated" style="font-size:0.62rem;color:#334155;margin:0;text-align:center;">Refreshes every 20s</p>
                    </div>
                </div>

                {{-- ── RIGHT: Chat panel ── --}}
                <div id="tm-main">

                    {{-- Empty state (default) --}}
                    <div id="tm-empty-state">
                        <div style="width:4rem;height:4rem;border-radius:1.25rem;background:#f1f5f9;display:flex;align-items:center;justify-content:center;margin-bottom:0.25rem;">
                            <svg style="width:2rem;height:2rem;color:#cbd5e1;" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M8.625 12a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0H8.25m4.125 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0H12m4.125 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0h-.375M21 12c0 4.556-4.03 8.25-9 8.25a9.764 9.764 0 01-2.555-.337A5.972 5.972 0 015.41 20.97a5.969 5.969 0 01-.474-.065 4.48 4.48 0 00.978-2.025c.09-.457-.133-.901-.467-1.226C3.93 16.178 3 14.189 3 12c0-4.556 4.03-8.25 9-8.25s9 3.694 9 8.25z"/>
                            </svg>
                        </div>
                        <p style="font-size:0.95rem;font-weight:700;color:#334155;margin:0;">Select a conversation</p>
                        <p style="font-size:0.8rem;color:#94a3b8;margin:0;">Click any ticket on the left to read &amp; reply</p>
                    </div>

                    {{-- Chat area (hidden until ticket selected) --}}
                    <div id="tm-chat-area" style="display:none;flex-direction:column;flex:1;min-height:0;">

                        {{-- Chat header --}}
                        <div id="tm-chat-header">
                            <div style="flex:1;min-width:0;">
                                <div style="display:flex;align-items:center;justify-content:space-between;gap:0.5rem;flex-wrap:wrap;">
                                    <div style="display:flex;align-items:center;gap:0.5rem;flex-wrap:wrap;">
                                        <span id="tc-ref" style="font-size:0.78rem;font-weight:800;color:#0f172a;font-family:monospace;"></span>
                                        <span id="tc-priority" style="font-size:0.62rem;font-weight:700;padding:2px 9px;border-radius:999px;"></span>
                                        <span id="tc-status" style="font-size:0.62rem;font-weight:600;color:#64748b;padding:2px 9px;border-radius:999px;background:#f1f5f9;border:1px solid #e2e8f0;"></span>
                                    </div>
                                    <button id="tc-resolve-btn" onclick="tmCloseTicket()" style="font-size:0.7rem;padding:0.35rem 0.75rem;background:#ef4444;color:white;border:none;border-radius:0.5rem;cursor:pointer;font-weight:700;transition:opacity 0.2s;display:none;">Resolve Ticket</button>
                                </div>
                                <p id="tc-title" style="font-size:0.9rem;font-weight:700;color:#1e293b;margin:2px 0 0;white-space:nowrap;overflow:hidden;text-overflow:ellipsis;"></p>
                                <p id="tc-item" style="font-size:0.72rem;color:#64748b;margin:1px 0 0;"></p>
                            </div>
                        </div>

                        {{-- Admin user info card --}}
                        <div id="tm-user-card">
                            <p style="font-size:0.6rem;font-weight:700;color:#92400e;text-transform:uppercase;letter-spacing:.1em;margin:0 0 5px;">Raised by</p>
                            <div style="display:flex;align-items:center;gap:0.625rem;flex-wrap:wrap;">
                                <div id="tc-avatar" style="width:2rem;height:2rem;border-radius:50%;background:#f59e0b;color:#fff;font-size:0.8rem;font-weight:800;display:flex;align-items:center;justify-content:center;flex-shrink:0;"></div>
                                <div style="min-width:0;flex:1;">
                                    <p id="tc-user-name" style="font-size:0.82rem;font-weight:700;color:#1e293b;margin:0;"></p>
                                    <p id="tc-user-email" style="font-size:0.7rem;color:#64748b;margin:0;"></p>
                                </div>
                                <span id="tc-user-location" style="font-size:0.65rem;font-weight:700;background:#e0f2fe;color:#0369a1;padding:3px 10px;border-radius:999px;"></span>
                            </div>
                            <div id="tc-contact-wrapper" style="margin-top:8px; padding-top:8px; border-top:1px solid #fef3c7; display:none;">
                                <p style="font-size:0.6rem;font-weight:700;color:#92400e;text-transform:uppercase;letter-spacing:.1em;margin:0 0 4px;">Whom to contact</p>
                                <p id="tc-contact-person" style="font-size:0.82rem;font-weight:700;color:#1e293b;margin:0;"></p>
                            </div>
                        </div>

                        {{-- Messages --}}
                        <div id="tm-messages"></div>

                        {{-- Reply image preview --}}
                        <div id="tm-reply-preview-cont" style="display:none; padding:0.75rem 1rem; border-top:1px solid #f1f5f9; background:#fff;">
                             <div style="position:relative; display:inline-block;">
                                 <img id="tm-reply-preview-img" src="#" style="max-height:80px; border-radius:8px; border:1px solid #e2e8f0;">
                                 <button type="button" onclick="tmRemoveReplyImage()" style="position:absolute; top:-6px; right:-6px; background:#f43f5e; color:white; border:none; border-radius:50%; width:18px; height:18px; cursor:pointer; font-size:10px; font-weight:bold; display:flex; align-items:center; justify-content:center;">×</button>
                             </div>
                             <p id="tm-reply-img-error" style="display:none; color:#f43f5e; font-size:0.65rem; font-weight:700; margin-top:4px;"></p>
                        </div>

                        {{-- Reply input --}}
                        <div id="tm-reply-bar">
                             <div style="position:relative; display:flex; align-items:center; justify-content:center; width:2.5rem; height:2.5rem; border-radius:12px; background:#f1f5f9; cursor:pointer; flex-shrink:0;" 
                                  onclick="document.getElementById('tm-reply-image').click()" 
                                  title="Attach image">
                                 <svg id="tm-reply-image-icon" style="width:1.25rem; height:1.25rem; color:#64748b;" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                     <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 15.75l5.159-5.159a2.25 2.25 0 013.182 0l5.159 5.159m-1.5-1.5l1.409-1.409a2.25 2.25 0 013.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 001.5-1.5V6.75a1.5 1.5 0 00-1.5-1.5H3.75a1.5 1.5 0 00-1.5 1.5v12.75a1.5 1.5 0 001.5 1.5zm10.5-11.25h.008v.008h-.008V8.25zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" />
                                 </svg>
                                 <input type="file" id="tm-reply-image" accept="image/*" style="display:none;" 
                                        onchange="handleReplyImage(this)">
                             </div>
                             <textarea id="tm-reply-input" rows="2" maxlength="2000" placeholder="Type your reply… (Enter to send, Shift+Enter for new line)"
                                       onkeydown="if(event.key==='Enter'&&!event.shiftKey){event.preventDefault();tmSendReply();}"></textarea>
                             <button id="tm-send-btn" onclick="tmSendReply()">Send ↑</button>
                        </div>

                        <div id="tm-status">
                            <p id="tm-status-text" style="font-size:0.65rem;color:#94a3b8;margin:0;text-align:center;"></p>
                        </div>
                    </div>
                </div>

            </div>{{-- end #tm-body --}}
        </div>{{-- end #tm-modal --}}
    </div>{{-- end #tm-overlay --}}

    <script>
    (function () {
        'use strict';

        /* ── Config ────────────────────────────────────────────────── */
        var POLL_MS      = 20000;
        var CHAT_POLL    = 8000;
        var LS_KEY       = 'notif_last_seen_at';
        var LS_REPLY_KEY = 'notif_last_reply_seen_at';   // non-admin: tracks when user last saw a reply
        var CSRF         = (document.querySelector('meta[name="csrf-token"]') || {getAttribute:function(){return '';}}).getAttribute('content');
        var NOTIF_URL    = '{{ route("tickets.notifications") }}';
        var TICKETS_URL  = '{{ url("tickets") }}';
        var IS_ADMIN     = {{ auth()->user()->hasRole('Admin') ? 'true' : 'false' }};

        var lastSeenAt      = localStorage.getItem(LS_KEY)       || '1970-01-01T00:00:00Z';
        var lastReplySeenAt = localStorage.getItem(LS_REPLY_KEY) || '1970-01-01T00:00:00Z';
        var allTickets      = [];
        var prevUnread      = 0;
        var chatTicketId    = null;
        var chatPollTimer   = null;
        var modalOpen       = false;

        /* ── Filter state ─────────────────────────────────────── */
        var filterDate     = 'all';
        var filterDateFrom = '';
        var filterDateTo   = '';
        var filterLocation = '';
        var filterStatus   = 'all';
        var filterPriority = '';
        var filterUnread   = false;
        var locationsPopulated = false;

        /* ── Web Audio Notification Sound (Ringtone on Mobile) ─────── */
        var audioCtx = null;
        function playNotificationSound() {
            try {
                if (!audioCtx) audioCtx = new (window.AudioContext || window.webkitAudioContext)();
                if (audioCtx.state === 'suspended') audioCtx.resume();
                
                function note(f, s, d, v) {
                    if (!audioCtx) return;
                    var o = audioCtx.createOscillator(), g = audioCtx.createGain();
                    o.connect(g); g.connect(audioCtx.destination);
                    o.type = 'sine'; o.frequency.setValueAtTime(f, s);
                    g.gain.setValueAtTime(0, s);
                    g.gain.linearRampToValueAtTime(v, s + 0.01);
                    g.gain.exponentialRampToValueAtTime(0.0001, s + d);
                    o.start(s); o.stop(s + d);
                }
                
                var t = audioCtx.currentTime;
                var isMobile = /iPhone|iPad|iPod|Android/i.test(navigator.userAgent);
                
                if (isMobile) {
                    // Persistent Mobile Ringtone (Ding-Ding-Ding pattern)
                    for (var i = 0; i < 4; i++) {
                        var offset = i * 0.45;
                        note(1318, t + offset,        0.3, 0.35); // E6
                        note(1046, t + offset + 0.15, 0.3, 0.25); // C6
                    }
                    if (navigator.vibrate) navigator.vibrate([200, 100, 200, 100, 200]);
                } else {
                    // Desktop Chime
                    note(880, t, 0.4, 0.2); 
                    note(1174, t + 0.1, 0.5, 0.15); 
                    note(1396, t + 0.2, 0.6, 0.12);
                    note(1760, t + 0.3, 0.8, 0.1);
                }
            } catch (e) { console.error('Sound error:', e); }
        }

        /* ── Badge & bell ─────────────────────────────────────────── */
        function updateBadge(n) {
            var badge = document.getElementById('notif-badge');
            var bell  = document.getElementById('notif-bell');
            var nb    = document.getElementById('tm-new-badge');
            var cp    = document.getElementById('tm-count-pill');
            if (n > 0) {
                badge.textContent = n > 99 ? '99+' : n;
                badge.style.display = 'flex';
                bell.classList.add('has-unread');
                if (nb) { nb.textContent = n + ' new'; nb.style.display = 'inline-block'; }
                if (cp) { cp.textContent = n + ' unread'; cp.style.display = 'inline-block'; }
            } else {
                badge.style.display = 'none';
                bell.classList.remove('has-unread');
                if (nb) nb.style.display = 'none';
                if (cp) cp.style.display = 'none';
            }
        }

        function ringBell() {
            var bell = document.getElementById('notif-bell');
            bell.classList.add('ringing');
            setTimeout(function(){ bell.classList.remove('ringing'); }, 800);
        }

        /* ── Render sidebar ticket list ────────────────────────────── */
        function renderSidebar(tickets) {
            var list  = document.getElementById('tm-list');
            var empty = document.getElementById('tm-list-empty');
            
            // Apply Unread Only filter on the frontend for speed
            var filtered = tickets;
            if (filterUnread) {
                var lastSeenDate = new Date(lastSeenAt);
                var lastReplySeenDate = new Date(lastReplySeenAt);
                
                filtered = tickets.filter(function(t) {
                    var ticketDate = new Date(t.created_at);
                    var replyDate  = t.latest_reply_at ? new Date(t.latest_reply_at) : null;
                    
                    if (IS_ADMIN) {
                        return ticketDate > lastSeenDate || (replyDate && replyDate > lastSeenDate);
                    } else {
                        return replyDate && replyDate > lastReplySeenDate;
                    }
                });
            }

            if (!filtered || filtered.length === 0) {
                list.innerHTML = '';
                if (empty) {
                    var clonedEmpty = empty.cloneNode(true);
                    if (filterUnread) {
                        clonedEmpty.querySelector('p').textContent = 'No unread tickets found';
                    }
                    list.appendChild(clonedEmpty);
                }
                return;
            }
            if (empty && empty.parentNode) empty.parentNode.removeChild(empty);

            var html = '';
            filtered.forEach(function(t) {
                var isNew         = new Date(t.created_at) > new Date(lastSeenAt);
                var hasNewReply   = !IS_ADMIN && t.latest_reply_at && new Date(t.latest_reply_at) > new Date(lastReplySeenAt);
                var isActive      = chatTicketId === t.id;
                var priBg         = t.colours.bg; var priTx = t.colours.text;
                var replyBadge    = t.replies_count > 0
                    ? ' <span style="font-size:.55rem;font-weight:700;background:#1e3a5f;color:#93c5fd;padding:1px 5px;border-radius:999px;">'+t.replies_count+' repl'+(t.replies_count===1?'y':'ies')+'</span>' : '';

                // Pulsing "NEW REPLY" indicator for non-admin with unread reply
                var newReplyPill = hasNewReply
                    ? '<span style="font-size:.55rem;font-weight:800;background:#16a34a;color:#fff;padding:1px 6px;border-radius:999px;'
                      + 'animation:replyPulse 1.4s ease-in-out infinite;display:inline-block;margin-left:3px;">NEW REPLY</span>'
                    : '';

                html += '<div class="tm-ticket-row'+(isActive?' active':'')+'" onclick="tmOpenChat('+t.id+')">';
                html +=   '<div class="tm-dot" style="background:'+t.colours.dot+';margin-top:6px;"></div>';
                html +=   '<div style="flex:1;min-width:0;">';
                html +=     '<div style="display:flex;justify-content:space-between;align-items:flex-start;gap:4px;">';
                html +=       '<span style="font-size:.78rem;font-weight:700;color:#e2e8f0;white-space:nowrap;overflow:hidden;text-overflow:ellipsis;max-width:160px;" title="'+esc(t.title)+'">'+esc(t.title)+'</span>';
                html +=       '<span style="font-size:.56rem;font-weight:700;padding:1px 6px;border-radius:999px;flex-shrink:0;background:'+priBg+';color:'+priTx+';">'+cap(t.priority)+'</span>';
                html +=     '</div>';
                if (IS_ADMIN) {
                    html += '<div style="display:flex;align-items:center;gap:3px;margin-top:2px;">';
                    html +=   '<span style="font-size:.68rem;font-weight:600;color:#94a3b8;">'+esc(t.raised_by)+'</span>';
                    html +=   '<span style="font-size:.58rem;background:rgba(14,165,233,.15);color:#7dd3fc;padding:0 5px;border-radius:999px;">'+esc(t.raised_by_location)+'</span>';
                    html += '</div>';
                }
                html +=     '<div style="font-size:.68rem;color:#475569;margin-top:2px;">'+esc(t.ref)+' &bull; '+esc(t.equipment)+replyBadge+newReplyPill+'</div>';
                html +=     '<div style="display:flex;align-items:center;justify-content:space-between;margin-top:3px;">';
                html +=       '<span style="font-size:.62rem;color:#334155;">'+esc(t.created_ago)+'</span>';
                html +=       (isNew && IS_ADMIN ? '<span style="width:6px;height:6px;border-radius:50%;background:#3b82f6;flex-shrink:0;"></span>' : '');
                html +=     '</div>';
                html +=   '</div>';
                html += '</div>';
            });
            list.innerHTML = html;
        }

        /* ── Open / close modal ────────────────────────────────────── */
        window.openNotifModal = function() {
            if (modalOpen) { closeNotifModal(); return; }
            
            // Resume/Init audio context on first user interaction
            if (audioCtx && audioCtx.state === 'suspended') audioCtx.resume();
            else if (!audioCtx) { try { audioCtx = new (window.AudioContext || window.webkitAudioContext)(); } catch(e){} }

            modalOpen = true;
            document.getElementById('tm-overlay').classList.add('open');
            document.body.style.overflow = 'hidden';

            // Non-admin: opening the panel counts as "seen all replies"
            if (!IS_ADMIN) {
                lastReplySeenAt = new Date().toISOString();
                localStorage.setItem(LS_REPLY_KEY, lastReplySeenAt);
                prevUnread = 0;
                updateBadge(0);
            }

            renderSidebar(allTickets);
        };

        window.closeNotifModal = function() {
            modalOpen = false;
            document.getElementById('tm-overlay').classList.remove('open');
            document.body.style.overflow = '';
        };

        // Keep backwards compat for any legacy toggleNotifPanel calls
        window.toggleNotifPanel = window.openNotifModal;

        // ESC key closes
        document.addEventListener('keydown', function(e){ if(e.key==='Escape' && modalOpen) closeNotifModal(); });

        // Click overlay backdrop to close
        document.getElementById('tm-overlay').addEventListener('click', function(e){
            if(e.target === this) closeNotifModal();
        });

        /* ── Open chat for a ticket ────────────────────────────────── */
        window.tmOpenChat = function(ticketId) {
            chatTicketId = ticketId;
            renderSidebar(allTickets); // Re-render to highlight active row

            // Hide empty state, show chat area
            var empty = document.getElementById('tm-empty-state');
            var chat  = document.getElementById('tm-chat-area');
            if (empty) empty.style.display = 'none';
            if (chat)  { chat.style.display = 'flex'; }

            // Show skeleton
            document.getElementById('tm-messages').innerHTML =
                '<div style="text-align:center;padding:2rem;color:#94a3b8;font-size:.8rem;">Loading conversation…</div>';
            document.getElementById('tm-reply-bar').style.display = 'none';

            loadReplies(ticketId);
            startChatPoll(ticketId);
        };

        /* ── Load replies ──────────────────────────────────────────── */
        function loadReplies(ticketId) {
            fetch(TICKETS_URL+'/'+ticketId+'/replies', {
                headers:{'Accept':'application/json','X-CSRF-TOKEN':CSRF,'X-Requested-With':'XMLHttpRequest'}
            })
            .then(function(r){ return r.ok ? r.json() : Promise.reject(r.status); })
            .then(function(data) {
                var t = data.ticket;
                if (t) {
                    populateChatHeader(t);
                    renderMessages(data.replies || [], t);
                }
                document.getElementById('tm-reply-bar').style.display = 'flex';
                var ts = document.getElementById('tm-status-text');
                if (ts) { var now = new Date(); ts.textContent = 'Updated '+now.getHours().toString().padStart(2,'0')+':'+now.getMinutes().toString().padStart(2,'0')+':'+now.getSeconds().toString().padStart(2,'0'); }
            })
            .catch(function(e){
                document.getElementById('tm-messages').innerHTML =
                    '<div style="text-align:center;padding:1.5rem;color:#f87171;font-size:.8rem;">Failed to load ('+e+')</div>';
            });
        }

        function populateChatHeader(t) {
            // Header pills
            var ref  = document.getElementById('tc-ref');   if(ref) ref.textContent = t.ref;
            var ttl  = document.getElementById('tc-title'); if(ttl) ttl.textContent = t.title;
            var itm  = document.getElementById('tc-item');  if(itm) itm.textContent = t.code+' • '+t.equipment;
            var pri  = document.getElementById('tc-priority');
            if (pri) { pri.textContent = cap(t.priority); pri.style.background=t.colours.bg; pri.style.color=t.colours.text; }
            var sta  = document.getElementById('tc-status'); if(sta) sta.textContent = cap(t.status);
            
            var resolveBtn = document.getElementById('tc-resolve-btn');
            var replyBar = document.getElementById('tm-reply-bar');
            
            if (t.status === 'closed') {
                if (resolveBtn) resolveBtn.style.display = 'none';
                if (replyBar) replyBar.style.display = 'none';
            } else {
                if (resolveBtn) resolveBtn.style.display = 'block';
                if (replyBar) replyBar.style.display = 'flex';
            }

            document.getElementById('tm-chat-header').style.display = 'flex';

            // Admin user card
            var card = document.getElementById('tm-user-card');
            if (IS_ADMIN && card) {
                card.style.display = 'block';
                var av = document.getElementById('tc-avatar');    if(av) av.textContent = (t.raised_by||'?').charAt(0).toUpperCase();
                var nm = document.getElementById('tc-user-name'); if(nm) nm.textContent = t.raised_by;
                var em = document.getElementById('tc-user-email');if(em) em.textContent = t.raised_by_email;
                var lc = document.getElementById('tc-user-location'); if(lc) lc.textContent = '📍 '+t.raised_by_location;
                
                var cw = document.getElementById('tc-contact-wrapper');
                var cp = document.getElementById('tc-contact-person');
                if (cw && cp) {
                    if (t.contact_person && t.contact_person !== '—') {
                        cp.textContent = t.contact_person;
                        cw.style.display = 'block';
                    } else {
                        cw.style.display = 'none';
                    }
                }
            }
        }

        function renderMessages(replies, ticket) {
            var container = document.getElementById('tm-messages');
            if (!container) return;

            var html = '';

            // 1. Original Ticket Description (Prepend as the very first bubble)
            if (ticket) {
                var isMine = !IS_ADMIN; // Usually true, as non-admin raises tickets
                var cls = 'cb ' + (isMine ? 'mine' : 'theirs') + ' original-desc';
                var img = ticket.image_url ? '<div style="margin-top:8px;"><img src="'+ticket.image_url+'" onclick="window.open(this.src)" style="max-width:100%; max-height:220px; border-radius:10px; cursor:pointer;" /></div>' : '';
                
                html += '<div style="display:flex;flex-direction:column;margin-bottom:1rem; opacity: 0.9;">';
                html +=   '<div class="'+cls+'" style="border: 2px dashed rgba(0,0,0,0.1); background: #fdfdfd; color: #334155;">';
                html +=     '<span style="font-size:0.6rem; font-weight:700; color:#64748b; text-transform:uppercase; letter-spacing:0.05em; display:block; margin-bottom:4px;">Original Issue Description</span>';
                html +=     esc(ticket.description) + img;
                html +=   '</div>';
                html +=   '<div class="cb-meta '+(isMine?'right':'')+'">'+esc(ticket.raised_by)+' &bull; '+esc(ticket.created_ago)+'</div>';
                html += '</div>';

                // Separator
                html += '<div style="display:flex; align-items:center; gap:1rem; margin:1rem 0;">';
                html +=   '<div style="flex:1; height:1px; background:#e2e8f0;"></div>';
                html +=   '<span style="font-size:0.65rem; color:#94a3b8; font-weight:700; text-transform:uppercase; letter-spacing:0.05em;">Conversation Messages</span>';
                html +=   '<div style="flex:1; height:1px; background:#e2e8f0;"></div>';
                html += '</div>';
            }

            if (replies.length === 0) {
                html += '<div style="text-align:center;padding:2rem;color:#cbd5e1;font-size:.8rem;">No replies yet — start the conversation!</div>';
            } else {
                replies.forEach(function(r) {
                    var cls  = 'cb '+(r.is_mine ? 'mine' : 'theirs')+(r.is_admin&&!r.is_mine ? ' admin-msg' : '');
                    var atag = r.is_admin ? '<span class="admin-badge">Admin</span>' : '';
                    var metaCls = 'cb-meta'+(r.is_mine ? ' right' : '');
                    var locInfo = IS_ADMIN && !r.is_mine ? ' &bull; 📍 '+esc(r.user_location) : '';
                    
                    var imgHtml = r.image_url ? '<div style="margin-top:8px;"><img src="'+r.image_url+'" onclick="window.open(this.src)" style="max-width:100%; max-height:220px; border-radius:10px; cursor:pointer; border:1px solid rgba(0,0,0,0.05);" /></div>' : '';

                    html += '<div style="display:flex;flex-direction:column;">';
                    html +=   '<div class="'+cls+'">'+esc(r.message)+imgHtml+'</div>';
                    html +=   '<div class="'+metaCls+'">'+esc(r.user_name)+atag+' &bull; '+esc(r.created_ago)+locInfo+'</div>';
                    html += '</div>';
                });
            }
            container.innerHTML = html;
            container.scrollTop = container.scrollHeight;
        }

        /* ── Send reply ────────────────────────────────────────────── */
        window.handleReplyImage = function(input) {
            var icon    = document.getElementById('tm-reply-image-icon');
            var errSpan = document.getElementById('tm-reply-img-error');
            var prevCont= document.getElementById('tm-reply-preview-cont');
            var prevImg = document.getElementById('tm-reply-preview-img');
            
            errSpan.style.display = 'none';

            if (input.files && input.files[0]) {
                var file = input.files[0];
                
                // Size validation (2MB)
                if (file.size > 2 * 1024 * 1024) {
                    errSpan.textContent = 'Large file: ' + (file.size/(1024*1024)).toFixed(2) + 'MB (Max 2MB)';
                    errSpan.style.display = 'block';
                    input.value = '';
                    icon.style.color = '#f43f5e'; // red
                    prevCont.style.display = 'none';
                    return;
                }

                // Preview
                var reader = new FileReader();
                reader.onload = function(e){
                    prevImg.src = e.target.result;
                    prevCont.style.display = 'block';
                };
                reader.readAsDataURL(file);

                icon.style.color = '#3b82f6'; // blue
                icon.innerHTML = '<path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />';
            } else {
                icon.style.color = '#64748b';
                icon.innerHTML = '<path stroke-linecap="round" stroke-linejoin="round" d="M2.25 15.75l5.159-5.159a2.25 2.25 0 013.182 0l5.159 5.159m-1.5-1.5l1.409-1.409a2.25 2.25 0 013.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 001.5-1.5V6.75a1.5 1.5 0 00-1.5-1.5H3.75a1.5 1.5 0 00-1.5 1.5v12.75a1.5 1.5 0 001.5 1.5zm10.5-11.25h.008v.008h-.008V8.25zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" />';
                prevCont.style.display = 'none';
            }
        };

        window.tmRemoveReplyImage = function() {
            var input = document.getElementById('tm-reply-image');
            input.value = '';
            handleReplyImage(input);
        };

        window.tmSendReply = function() {
            if (!chatTicketId) return;
            var input = document.getElementById('tm-reply-input');
            var imgInput = document.getElementById('tm-reply-image');
            var msg   = input.value.trim();
            if (!msg && !imgInput.files[0]) return;
            var btn   = document.getElementById('tm-send-btn');
            btn.disabled = true; btn.textContent = '…';
            
            var formData = new FormData();
            formData.append('message', msg);
            if (imgInput.files[0]) {
                formData.append('image', imgInput.files[0]);
            }

            fetch(TICKETS_URL+'/'+chatTicketId+'/replies', {
                method:'POST',
                headers:{'Accept':'application/json','X-CSRF-TOKEN':CSRF},
                body:formData
            })
            .then(function(r){ return r.ok ? r.json() : Promise.reject(); })
            .then(function(data) {
                if (data.success) {
                    var c = document.getElementById('tm-messages');
                    var r = data.reply;
                    if (c) {
                        var imgHtml = r.image_url ? '<div style="margin-top:8px;"><img src="'+r.image_url+'" onclick="window.open(this.src)" style="max-width:100%; max-height:200px; border-radius:8px; cursor:pointer;" /></div>' : '';
                        c.insertAdjacentHTML('beforeend',
                            '<div style="display:flex;flex-direction:column;">'
                            +'<div class="cb mine">'+esc(r.message)+imgHtml+'</div>'
                            +'<div class="cb-meta right">'+esc(r.user_name)+' &bull; just now</div>'
                            +'</div>'
                        );
                        c.scrollTop = c.scrollHeight;
                    }
                    input.value = '';
                    imgInput.value = '';
                    handleReplyImage(imgInput);
                }
            })
            .catch(function(){ alert('Network error while sending reply'); })
            .finally(function(){ btn.disabled=false; btn.textContent='Send ↑'; });
        };

        /* ── Close/Resolve Ticket ──────────────────────────────────── */
        window.tmCloseTicket = function() {
            if (!chatTicketId || !confirm('Are you sure you want to resolve and close this ticket?')) return;
            
            var btn = document.getElementById('tc-resolve-btn');
            if (btn) { btn.disabled = true; btn.textContent = 'Closing...'; }
            
            fetch(TICKETS_URL+'/'+chatTicketId+'/close', {
                method:'POST',
                headers:{'Content-Type':'application/json','Accept':'application/json','X-CSRF-TOKEN':CSRF}
            })
            .then(function(r){ return r.ok ? r.json() : Promise.reject(); })
            .then(function(data) {
                if (data.success) {
                    if (data.ticket) populateChatHeader(data.ticket);
                    if (data.reply) {
                        var c = document.getElementById('tm-messages');
                        var r = data.reply;
                        if (c) {
                            c.insertAdjacentHTML('beforeend',
                                '<div style="display:flex;flex-direction:column;margin-top:.5rem;margin-bottom:.5rem;">'
                                +'<div style="text-align:center;font-size:0.75rem;font-weight:600;color:#64748b;background:#f1f5f9;padding:0.4rem 0.8rem;border-radius:1rem;align-self:center;">'+esc(r.message)+'</div>'
                                +'</div>'
                            );
                            c.scrollTop = c.scrollHeight;
                        }
                    }
                    poll(); // refresh unread counts & sidebar
                } else {
                    alert(data.message || 'Error closing ticket');
                }
            })
            .catch(function(){ 
                alert('Network error while closing ticket'); 
            })
            .finally(function() {
                if (btn && btn.style.display !== 'none') { btn.disabled = false; btn.textContent = 'Resolve Ticket'; }
            });
        };

        /* ── Chat auto-poll ────────────────────────────────────────── */
        function startChatPoll(ticketId) {
            if (chatPollTimer) clearInterval(chatPollTimer);
            chatPollTimer = setInterval(function(){
                if (chatTicketId === ticketId) loadReplies(ticketId);
                else { clearInterval(chatPollTimer); chatPollTimer = null; }
            }, CHAT_POLL);
        }

        /* ── Build poll URL with current filters ───────────────── */
        function buildPollURL() {
            var params = [];
            if (filterDate && filterDate !== 'all') {
                params.push('date_range=' + filterDate);
                if (filterDate === 'custom') {
                    if (filterDateFrom) params.push('date_from=' + filterDateFrom);
                    if (filterDateTo)   params.push('date_to=' + filterDateTo);
                }
            }
            if (filterLocation && IS_ADMIN)               params.push('location_id='+filterLocation);
            if (filterStatus   && filterStatus !== 'all') params.push('status='+filterStatus);
            if (filterPriority)                           params.push('priority='+filterPriority);
            return NOTIF_URL + (params.length ? '?'+params.join('&') : '');
        }

        /* ── Update filter UI label + Reset button + Bell outline ─── */
        function updateFilterLabel() {
            var parts = [];
            if (filterDate && filterDate !== 'all') {
                if (filterDate === 'custom') {
                    if (filterDateFrom && filterDateTo) parts.push('Range: '+filterDateFrom+' to '+filterDateTo);
                    else parts.push('Date: Custom');
                } else {
                    parts.push('Date: ' + filterDate);
                }
            }
            if (filterLocation && IS_ADMIN) {
                var sel = document.getElementById('tm-filter-location');
                var opt = sel ? sel.options[sel.selectedIndex] : null;
                if (opt && opt.value) parts.push('Loc: '+opt.text);
            }
            if (filterStatus && filterStatus !== 'all') parts.push('Status: '+cap(filterStatus));
            if (filterPriority) parts.push('Priority: '+cap(filterPriority));
            if (filterUnread)   parts.push('⚡ Unread Only');

            var lbl = document.getElementById('tm-filter-active-label');
            var rst = document.getElementById('tm-filter-reset');
            var bell = document.getElementById('notif-bell');

            if (parts.length) {
                if (lbl) lbl.textContent = parts.join(' • ');
                if (lbl) lbl.style.color = '#fb923c';
                if (rst) rst.style.display = 'inline-block';
                if (bell) bell.classList.add('filter-active');
            } else {
                if (lbl) { lbl.textContent = 'No active filters'; lbl.style.color = '#64748b'; }
                if (rst) rst.style.display = 'none';
                if (bell) bell.classList.remove('filter-active');
            }
        }

        /* ── Date pill click ────────────────────────────────── */
        window.tmSetDate = function(btn) {
            document.querySelectorAll('.tm-date-pill').forEach(function(b){ b.classList.remove('active'); });
            btn.classList.add('active');
            filterDate = btn.getAttribute('data-val');
            
            var customDiv = document.getElementById('tm-custom-date');
            if (filterDate === 'custom') {
                if (customDiv) customDiv.style.display = 'flex';
            } else {
                if (customDiv) customDiv.style.display = 'none';
                updateFilterLabel();
                poll();
            }
        };

        /* ── Select change trigger ──────────────────────────── */
        window.tmApplyFilters = function() {
            var locSel  = document.getElementById('tm-filter-location');
            var staSel  = document.getElementById('tm-filter-status');
            var priSel  = document.getElementById('tm-filter-priority');
            var dtFrom  = document.getElementById('tm-filter-date-from');
            var dtTo    = document.getElementById('tm-filter-date-to');
            
            filterLocation = locSel ? locSel.value : '';
            filterStatus   = staSel ? staSel.value : 'all';
            filterPriority = priSel ? priSel.value : '';
            filterDateFrom = dtFrom ? dtFrom.value : '';
            filterDateTo   = dtTo   ? dtTo.value   : '';
            
            updateFilterLabel();
            poll();
        };

        /* ── Toggle Unread Filter ───────────────────────────── */
        window.tmToggleUnread = function(btn) {
            filterUnread = !filterUnread;
            if (filterUnread) {
                btn.style.background = '#16a34a';
                btn.style.color      = '#ffffff';
                btn.classList.add('active');
            } else {
                btn.style.background = 'rgba(22,163,74,0.1)';
                btn.style.color      = '#16a34a';
                btn.classList.remove('active');
            }
            updateFilterLabel();
            renderSidebar(allTickets);
        };

        /* ── Reset all filters ──────────────────────────────── */
        window.tmResetFilters = function() {
            filterDate = 'all'; filterLocation = ''; filterStatus = 'all'; filterPriority = '';
            filterDateFrom = ''; filterDateTo = ''; filterUnread = false;
            
            var unreadBtn = document.getElementById('tm-filter-unread-btn');
            if (unreadBtn) {
                unreadBtn.classList.remove('active');
                unreadBtn.style.background = 'rgba(22,163,74,0.1)';
                unreadBtn.style.color = '#16a34a';
            }

            document.querySelectorAll('.tm-date-pill').forEach(function(b){ b.classList.remove('active'); });
            var allPill = document.querySelector('.tm-date-pill[data-val="all"]');
            if (allPill) allPill.classList.add('active');
            
            var customDiv = document.getElementById('tm-custom-date');
            if (customDiv) customDiv.style.display = 'none';
            
            var locSel = document.getElementById('tm-filter-location');
            var staSel = document.getElementById('tm-filter-status');
            var priSel = document.getElementById('tm-filter-priority');
            var dtFrom = document.getElementById('tm-filter-date-from');
            var dtTo   = document.getElementById('tm-filter-date-to');
            
            if (locSel) locSel.value = '';
            if (staSel) staSel.value = 'all';
            if (priSel) priSel.value = '';
            if (dtFrom) dtFrom.value = '';
            if (dtTo)   dtTo.value   = '';
            
            updateFilterLabel();
            poll();
        };

        /* ── Populate location dropdown (admin, one-time from first poll) ─ */
        function populateLocations(locations) {
            if (locationsPopulated || !IS_ADMIN || !locations || !locations.length) return;
            var sel = document.getElementById('tm-filter-location');
            if (!sel) return;
            locations.forEach(function(loc) {
                var opt = document.createElement('option');
                opt.value = loc.id;
                opt.textContent = loc.name;
                sel.appendChild(opt);
            });
            locationsPopulated = true;
        }

        /* ── Global poll ────────────────────────────────────── */
        function poll() {
            fetch(buildPollURL(), {headers:{'Accept':'application/json','X-CSRF-TOKEN':CSRF,'X-Requested-With':'XMLHttpRequest'}})
            .then(function(r){ return r.ok ? r.json() : Promise.reject(); })
            .then(function(data) {
                allTickets = data.tickets || [];

                // Populate location dropdown for admin on first successful poll
                if (data.locations && data.locations.length) populateLocations(data.locations);

                var unread;
                if (IS_ADMIN) {
                    // Admin: count new tickets raised since last seen
                    unread = allTickets.filter(function(t){ return new Date(t.created_at) > new Date(lastSeenAt); }).length;
                } else {
                    // Non-admin: count MY tickets that have NEW admin replies since last reply-seen timestamp
                    unread = allTickets.filter(function(t){
                        return t.latest_reply_at && new Date(t.latest_reply_at) > new Date(lastReplySeenAt);
                    }).length;
                }

                if (unread > prevUnread) { ringBell(); playNotificationSound(); }
                prevUnread = unread;
                updateBadge(unread);
                if (modalOpen) renderSidebar(allTickets);
                var lu = document.getElementById('tm-last-updated');
                if (lu) { var now=new Date(); lu.textContent='Updated '+now.getHours().toString().padStart(2,'0')+':'+now.getMinutes().toString().padStart(2,'0'); }
            })
            .catch(function(){});
        }

        /* ── Mark all read ─────────────────────────────────────────── */
        window.markAllSeen = function() {
            var now = new Date().toISOString();
            // Admin: reset new-ticket tracking
            lastSeenAt = now;
            localStorage.setItem(LS_KEY, lastSeenAt);
            // Non-admin: reset new-reply tracking
            lastReplySeenAt = now;
            localStorage.setItem(LS_REPLY_KEY, lastReplySeenAt);
            prevUnread = 0;
            updateBadge(0);
            renderSidebar(allTickets);
        };

        /* ── Helpers ───────────────────────────────────────────────── */
        function esc(s){ return String(s||'').replace(/&/g,'&amp;').replace(/</g,'&lt;').replace(/>/g,'&gt;').replace(/"/g,'&quot;'); }
        function cap(s){ return s ? s.charAt(0).toUpperCase()+s.slice(1) : ''; }

        /* ── Move bell into header slot ────────────────────────────── */
        (function(){
            var slot = document.getElementById('notif-bell-slot');
            var wrap = document.getElementById('notif-wrapper');
            if (slot && wrap) slot.appendChild(wrap);
        })();

        /* ── Bootstrap ─────────────────────────────────────────────── */
        poll();
        setInterval(poll, POLL_MS);

        /* ── Called from index.blade.php on ticket submit ──────────── */
        window.notifTicketSubmitted = function(ticketData) {
            allTickets.unshift(ticketData);
            prevUnread++;
            updateBadge(prevUnread);
            ringBell(); playNotificationSound();
            if (modalOpen) renderSidebar(allTickets);
        };

    })();
    </script>
    {{-- ===== END TICKET NOTIFICATION MODAL ===== --}}
</body>
</html>