<x-app-layout>
    <div class="max-w-5xl mx-auto py-10 px-4 sm:px-6 lg:px-8">
        <!-- Breadcrumbs & Navigation -->
        <nav class="flex mb-8" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-3">
                <li class="inline-flex items-center">
                    <a href="{{ route('dashboard') }}" class="inline-flex items-center text-sm font-medium text-slate-500 hover:text-orange-600 transition-colors">
                        <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path>
                        </svg>
                        Dashboard
                    </a>
                </li>
                <li>
                    <div class="flex items-center">
                        <svg class="w-6 h-6 text-slate-300" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                        </svg>
                        <a href="{{ route('item-masters.index') }}" class="ml-1 text-sm font-medium text-slate-500 hover:text-orange-600 md:ml-2 transition-colors">Item Master</a>
                    </div>
                </li>
                <li aria-current="page">
                    <div class="flex items-center">
                        <svg class="w-6 h-6 text-slate-300" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                        </svg>
                        <span class="ml-1 text-sm font-bold text-slate-900 md:ml-2 uppercase tracking-tight">{{ $itemMaster->code }}</span>
                    </div>
                </li>
            </ol>
        </nav>

        <!-- Main Content Card -->
        <div class="bg-white rounded-[32px] shadow-2xl shadow-slate-200/50 border border-slate-100 overflow-hidden">
            <!-- Card Header -->
            <div class="px-8 py-10 bg-slate-900 relative overflow-hidden">
                <!-- Abstract Background Pattern -->
                <div class="absolute top-0 right-0 -mr-16 -mt-16 w-64 h-64 bg-orange-600/10 rounded-full blur-3xl"></div>
                <div class="absolute bottom-0 left-0 -ml-16 -mb-16 w-48 h-48 bg-teal-500/10 rounded-full blur-2xl"></div>

                <div class="relative flex flex-col md:flex-row md:items-center justify-between gap-6 uppercase">
                    <div class="flex items-center">
                        <div class="p-4 bg-orange-600 rounded-2xl shadow-lg shadow-orange-600/30 mr-6">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                            </svg>
                        </div>
                        <div>
                            <span class="text-orange-500 text-xs font-bold tracking-[0.2em] mb-1 block">EQUIPMENT DETAILS</span>
                            <h1 class="text-3xl font-black text-white tracking-tight leading-tight italic">{{ $itemMaster->equipment }}</h1>
                        </div>
                    </div>
                    <div class="flex flex-col items-end">
                        <span class="text-slate-400 text-[10px] font-bold tracking-[0.2em] mb-1">UNIQUE ITEM CODE</span>
                        <div class="px-4 py-2 bg-white/5 border border-white/10 rounded-xl">
                            <span class="text-xl font-mono font-black text-orange-400">{{ $itemMaster->code }}</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Card Body -->
            <div class="p-8 md:p-12">
                <!-- Stats Grid -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-12">
                    <div class="bg-slate-50 rounded-2xl p-6 border border-slate-100 group hover:border-orange-200 transition-all">
                        <span class="text-slate-400 text-xs font-bold uppercase tracking-widest block mb-3">Quantity & Unit</span>
                        <div class="flex items-baseline gap-2">
                            <span class="text-3xl font-black text-slate-900">{{ number_format($itemMaster->qty) }}</span>
                            <span class="text-sm font-bold text-slate-500 uppercase font-mono px-2 py-0.5 bg-slate-200 rounded">{{ $itemMaster->uom }}</span>
                        </div>
                    </div>

                    <div class="bg-slate-50 rounded-2xl p-6 border border-slate-100 group hover:border-indigo-200 transition-all">
                        <span class="text-slate-400 text-xs font-bold uppercase tracking-widest block mb-3">Serial Number</span>
                        @if($itemMaster->serial_no)
                            <span class="text-2xl font-bold text-slate-900 font-mono tracking-tight">{{ $itemMaster->serial_no }}</span>
                        @else
                            <span class="text-xl font-bold text-slate-300 italic">Not Specified</span>
                        @endif
                    </div>

                    <div class="bg-slate-50 rounded-2xl p-6 border border-slate-100 group hover:border-emerald-200 transition-all">
                        <span class="text-slate-400 text-xs font-bold uppercase tracking-widest block mb-3">Assigned Location</span>
                        <div class="flex items-center text-slate-900 capitalize italic">
                            <div class="w-8 h-8 rounded-lg bg-emerald-100 text-emerald-600 flex items-center justify-center mr-3">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                </svg>
                            </div>
                            <span class="text-xl font-black">{{ $itemMaster->location->name }}</span>
                        </div>
                    </div>
                </div>

                <!-- Remarks Section -->
                @if($itemMaster->remarks)
                <div class="mb-12">
                    <h3 class="text-sm font-black text-slate-900 uppercase tracking-widest mb-4 flex items-center">
                        <span class="w-8 h-px bg-slate-200 mr-4"></span>
                        Remarks & Observations
                    </h3>
                    <div class="bg-orange-50 border-l-4 border-orange-500 p-6 rounded-r-2xl">
                        <p class="text-slate-700 leading-relaxed italic text-lg font-medium">
                            "{{ $itemMaster->remarks }}"
                        </p>
                    </div>
                </div>
                @endif

                <!-- Timeline / Metadata -->
                <div class="flex flex-col sm:flex-row sm:items-center justify-between pb-8 border-b border-slate-100 gap-4 uppercase font-bold">
                    <div class="flex items-center text-xs text-slate-400">
                        <span class="mr-4">Created: <span class="text-slate-600">{{ $itemMaster->created_at->format('d M Y, h:i A') }}</span></span>
                        <span>Updated: <span class="text-slate-600">{{ $itemMaster->updated_at->format('d M Y, h:i A') }}</span></span>
                    </div>
                    
                    @can('edit item masters')
                    <a href="{{ route('item-masters.edit', $itemMaster->id) }}" class="inline-flex items-center px-8 py-3 bg-slate-900 hover:bg-orange-600 text-white rounded-2xl transition-all font-black tracking-widest text-xs uppercase italic active:scale-95 group">
                        <svg class="w-4 h-4 mr-2 group-hover:rotate-12 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                        </svg>
                        Edit Item Details
                    </a>
                    @endcan
                </div>

                <!-- Footer Actions -->
                <div class="mt-8 flex justify-center">
                    <a href="{{ route('item-masters.index') }}" class="text-slate-400 hover:text-slate-900 font-bold text-sm flex items-center transition-colors uppercase tracking-[0.2em] italic">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                        </svg>
                        Back to Inventory
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
