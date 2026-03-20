<x-app-layout>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        <!-- Dashboard Cards -->
        <div
            class="bg-white rounded-xl shadow-sm border border-slate-200 p-6 flex items-center hover:shadow-md transition-shadow">
            <div class="p-4 bg-blue-50 text-blue-600 rounded-lg mr-4">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z">
                    </path>
                </svg>
            </div>
            <div>
                <p class="text-sm font-medium text-slate-500">Active Personnel</p>
                <p class="text-2xl font-bold text-slate-800">12,450</p>
            </div>
        </div>
        <div
            class="bg-white rounded-xl shadow-sm border border-slate-200 p-6 flex items-center hover:shadow-md transition-shadow">
            <div class="p-4 bg-orange-50 text-orange-600 rounded-lg mr-4">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                </svg>
            </div>
            <div>
                <p class="text-sm font-medium text-slate-500">Ongoing Operations</p>
                <p class="text-2xl font-bold text-slate-800">34</p>
            </div>
        </div>
        <div
            class="bg-white rounded-xl shadow-sm border border-slate-200 p-6 flex items-center hover:shadow-md transition-shadow">
            <div class="p-4 bg-emerald-50 text-emerald-600 rounded-lg mr-4">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
            </div>
            <div>
                <p class="text-sm font-medium text-slate-500">Vessels Deployed</p>
                <p class="text-2xl font-bold text-slate-800">89</p>
            </div>
        </div>
        <div
            class="bg-white rounded-xl shadow-sm border border-slate-200 p-6 flex items-center hover:shadow-md transition-shadow">
            <div class="p-4 bg-purple-50 text-purple-600 rounded-lg mr-4">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
            </div>
            <div>
                <p class="text-sm font-medium text-slate-500">Flight Hours (MTD)</p>
                <p class="text-2xl font-bold text-slate-800">1,204h</p>
            </div>
        </div>
    </div>

    <!-- Notice Board Section -->
    <div class="bg-white rounded-xl shadow-lg border border-slate-200 overflow-hidden mb-8">
        <!-- Header -->
        <div class="px-6 py-4 bg-teal-700 flex items-center justify-between">
            <div class="flex items-center text-white">
                <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9">
                    </path>
                </svg>
                <h3 class="text-xl font-bold tracking-wide text-black">Notice Board</h3>
            </div>
            <div class="flex items-center">
                <span
                    class="text-teal-50 text-xs font-semibold bg-teal-800/50 px-3 py-1 rounded-full border border-teal-600/30">
                    {{ now()->format('d M Y') }}
                </span>
            </div>
        </div>

        <!-- Notices Content -->
        <div class="px-5 py-6">
            @if ($notices->isEmpty())
                <div class="py-16 text-center text-slate-400">
                    <svg class="w-12 h-12 mx-auto mb-4 opacity-20" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                        </path>
                    </svg>
                    <p class="italic">No active notices published yet.</p>
                </div>
            @else
                <div class="notice-slider overflow-y-auto h-[450px] space-y-4 pr-3 custom-scrollbar"
                    id="notice-container">
                    @foreach ($notices as $notice)
                        <div class="notice-item group bg-white rounded-xl border border-slate-100 hover:border-teal-200 hover:shadow-md transition-all duration-300 overflow-hidden"
                            style="margin-bottom: 10px;">
                            <!-- Notice Header -->
                            <button onclick="toggleNotice(this)"
                                class="w-full text-left focus:outline-none p-4 flex items-center gap-4">
                                <!-- Status Icon -->
                                <div class="flex-shrink-0">
                                    @php
                                        $catColors = [
                                            'Important' => 'bg-orange-50 text-orange-600 border-orange-100',
                                            'FAQ' => 'bg-teal-50 text-teal-600 border-teal-100',
                                            'General' => 'bg-slate-50 text-slate-500 border-slate-100',
                                        ];
                                        $c = $catColors[$notice->category] ?? $catColors['General'];
                                    @endphp
                                    <div
                                        class="flex h-10 w-10 items-center justify-center rounded-lg {{ $c }} border">
                                        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            @if ($notice->category == 'Important')
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z">
                                                </path>
                                            @elseif($notice->category == 'FAQ')
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
                                                </path>
                                            @else
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
                                                </path>
                                            @endif
                                        </svg>
                                    </div>
                                </div>

                                <!-- Title and Meta -->
                                <div class="flex-1 min-w-0">
                                    <div class="flex items-center gap-2 mb-1">
                                        <span
                                            class="px-2 py-0.5 rounded text-[10px] font-bold uppercase tracking-widest border {{ $c }}">
                                            {{ $notice->category }}
                                        </span>
                                        <span class="text-[10px] font-medium text-slate-400 capitalize">
                                            {{ $notice->published_at->format('d M — h:i A') }}
                                        </span>
                                        @if ($notice->created_at->gt(now()->subDays(2)))
                                            <span
                                                class="px-1.5 py-0.5 rounded bg-rose-500 text-[9px] font-bold text-white uppercase tracking-tighter">NEW</span>
                                        @endif
                                    </div>
                                    <h4
                                        class="text-sm font-bold text-slate-800 group-hover:text-teal-700 transition-colors duration-200">
                                        {{ $notice->title }}
                                    </h4>
                                </div>

                                <!-- Toggle Icon -->
                                <div class="flex-shrink-0">
                                    <svg class="w-5 h-5 text-slate-300 group-hover:text-teal-500 transform transition-transform duration-300 accordion-icon"
                                        fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 9l-7 7-7-7"></path>
                                    </svg>
                                </div>
                            </button>

                            <!-- Notice Content -->
                            <div class="notice-content hidden bg-slate-50/50 border-t border-slate-100">
                                <div class="p-4 flex flex-col md:flex-row gap-6">
                                    @php
                                        $extension = $notice->file_path
                                            ? pathinfo($notice->file_path, PATHINFO_EXTENSION)
                                            : '';
                                        $isImage = in_array(strtolower($extension), [
                                            'jpg',
                                            'jpeg',
                                            'png',
                                            'gif',
                                            'svg',
                                        ]);
                                    @endphp

                                    @if ($notice->file_path && $isImage)
                                        <div
                                            class="w-full md:w-32 h-20 bg-white rounded border border-slate-200 flex-shrink-0 overflow-hidden">
                                            <img src="{{ asset('storage/' . $notice->file_path) }}"
                                                class="w-full h-full object-cover">
                                        </div>
                                    @endif

                                    <div class="flex-1">
                                        <p class="text-[13px] text-slate-600 leading-relaxed mb-4">
                                            {{ $notice->content ?: 'No detailed content provided.' }}
                                        </p>

                                        {{-- @if ($notice->file_path)
                                            <a href="{{ asset('storage/' . $notice->file_path) }}" target="_blank"
                                                class="inline-flex items-center px-3 py-1.5 bg-slate-800 hover:bg-teal-700 text-white text-[11px] font-bold rounded transition-colors uppercase tracking-wider">
                                                @if ($isImage)
                                                    <svg class="w-3.5 h-3.5 mr-2" fill="none"
                                                        stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                                    </svg>
                                                    View Image
                                                @else
                                                    <svg class="w-3.5 h-3.5 mr-2" fill="none"
                                                        stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M4 16v1a2 2 0 002 2h12a2 2 0 002-2v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                                                    </svg>
                                                    Download File
                                                @endif
                                            </a>
                                        @endif --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Slider Controls -->
                {{-- <div class="mt-6 flex items-center justify-center gap-4">
                    <button id="prevNotice"
                        class="w-10 h-10 rounded-full bg-white border border-slate-200 flex items-center justify-center text-slate-400 hover:text-teal-600 hover:border-teal-300 transition-all">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 19l-7-7 7-7"></path>
                        </svg>
                    </button>
                    <button id="nextNotice"
                        class="w-10 h-10 rounded-full bg-white border border-slate-200 flex items-center justify-center text-slate-400 hover:text-teal-600 hover:border-teal-300 transition-all">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7">
                            </path>
                        </svg>
                    </button>
                </div> --}}
            @endif
        </div>
    </div>

    <style>
        .custom-scrollbar::-webkit-scrollbar {
            width: 4px;
        }

        .custom-scrollbar::-webkit-scrollbar-track {
            background: #f8fafc;
        }

        .custom-scrollbar::-webkit-scrollbar-thumb {
            background: #e2e8f0;
            border-radius: 10px;
        }

        .custom-scrollbar::-webkit-scrollbar-thumb:hover {
            background: #cbd5e1;
        }
    </style>

    <script>
        function toggleNotice(button) {
            const container = button.closest('.notice-item');
            const content = container.querySelector('.notice-content');
            const icon = button.querySelector('.accordion-icon');

            const isHidden = content.classList.contains('hidden');

            // Close others
            document.querySelectorAll('.notice-content').forEach(el => el.classList.add('hidden'));
            document.querySelectorAll('.accordion-icon').forEach(el => el.classList.remove('rotate-180'));

            if (isHidden) {
                content.classList.remove('hidden');
                icon.classList.add('rotate-180');
            }
        }

        document.addEventListener('DOMContentLoaded', function() {
            const container = document.getElementById('notice-container');
            if (!container) return;

            document.getElementById('nextNotice').addEventListener('click', () => {
                container.scrollBy({
                    top: 100,
                    behavior: 'smooth'
                });
            });

            document.getElementById('prevNotice').addEventListener('click', () => {
                container.scrollBy({
                    top: -100,
                    behavior: 'smooth'
                });
            });

            // Gentle Auto-scroll
            setInterval(() => {
                if (container.matches(':hover')) return;
                if (container.scrollTop + container.clientHeight >= container.scrollHeight - 5) {
                    container.scrollTo({
                        top: 0,
                        behavior: 'smooth'
                    });
                } else {
                    container.scrollBy({
                        top: 1,
                        behavior: 'auto'
                    });
                }
            }, 50);
        });
    </script>
</x-app-layout>
