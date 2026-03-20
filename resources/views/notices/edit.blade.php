<x-app-layout>
    <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
        <div class="mb-6">
            <h2 class="text-2xl font-semibold text-slate-800">Edit Notice: {{ $notice->title }}</h2>
        </div>

        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
            <form action="{{ route('notices.update', $notice->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="grid grid-cols-1 gap-6 mb-6">
                    <div>
                        <label for="title" class="block text-sm font-medium text-slate-700">Notice Title</label>
                        <input type="text" name="title" id="title" value="{{ old('title', $notice->title) }}"
                            class="mt-1 block w-full border-slate-300 rounded-md shadow-sm focus:ring-orange-500 focus:border-orange-500"
                            required>
                        @error('title')
                            <p class="text-red-600 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="category" class="block text-sm font-medium text-slate-700">Category</label>
                            <select name="category" id="category"
                                class="mt-1 block w-full border-slate-300 rounded-md shadow-sm focus:ring-orange-500 focus:border-orange-500">
                                <option value="General"
                                    {{ old('category', $notice->category) == 'General' ? 'selected' : '' }}>General
                                </option>
                                {{-- <option value="FAQ" {{ old('category', $notice->category) == 'FAQ' ? 'selected' : '' }}>FAQ</option> --}}
                                <option value="Important"
                                    {{ old('category', $notice->category) == 'Important' ? 'selected' : '' }}>Important
                                </option>
                                <option value="Circular"
                                    {{ old('category', $notice->category) == 'Circular' ? 'selected' : '' }}>Circular
                                </option>
                            </select>
                            @error('category')
                                <p class="text-red-600 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label for="published_at" class="block text-sm font-medium text-slate-700">Publish Date &
                                Time (Optional)</label>
                            <input type="datetime-local" name="published_at" id="published_at"
                                value="{{ old('published_at', $notice->published_at ? $notice->published_at->format('Y-m-d\TH:i') : '') }}"
                                class="mt-1 block w-full border-slate-300 rounded-md shadow-sm focus:ring-orange-500 focus:border-orange-500">
                            @error('published_at')
                                <p class="text-red-600 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div>
                        <label for="content" class="block text-sm font-medium text-slate-700">Content / Description
                            (Optional)</label>
                        <textarea name="content" id="content" rows="4"
                            class="mt-1 block w-full border-slate-300 rounded-md shadow-sm focus:ring-orange-500 focus:border-orange-500">{{ old('content', $notice->content) }}</textarea>
                        @error('content')
                            <p class="text-red-600 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="file" class="block text-sm font-medium text-slate-700">Change Attachment
                            (Optional)</label>
                        @if ($notice->file_path)
                            @php
                                $extension = pathinfo($notice->file_path, PATHINFO_EXTENSION);
                                $isImage = in_array(strtolower($extension), ['jpg', 'jpeg', 'png', 'gif', 'svg']);
                            @endphp
                            <div class="mb-4 mt-2">
                                <p class="text-xs font-bold text-slate-500 uppercase mb-2">Current Attachment:</p>
                                @if ($isImage)
                                    <div
                                        class="relative w-32 h-32 rounded-lg border border-slate-200 overflow-hidden shadow-sm">
                                        <img src="{{ asset('storage/' . $notice->file_path) }}"
                                            class="w-full h-full object-cover">
                                    </div>
                                @else
                                    <div class="p-2 bg-slate-50 rounded border border-slate-200 flex items-center">
                                        <svg class="w-5 h-5 text-slate-500 mr-2" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13">
                                            </path>
                                        </svg>
                                        <span
                                            class="text-sm text-slate-600 truncate">{{ basename($notice->file_path) }}</span>
                                    </div>
                                @endif
                            </div>
                        @endif
                        <input type="file" name="file" id="file"
                            class="mt-1 block w-full border border-slate-300 rounded-md shadow-sm focus:ring-orange-500 focus:border-orange-500 p-2">
                        @error('file')
                            <p class="text-red-600 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="inline-flex items-center cursor-pointer">
                            <input type="hidden" name="is_active" value="0">
                            <input type="checkbox" name="is_active" value="1"
                                class="rounded border-slate-300 text-orange-600 shadow-sm focus:ring-orange-500"
                                {{ $notice->is_active ? 'checked' : '' }}>
                            <span class="ml-2 text-sm text-slate-600 font-bold">Mark as Active</span>
                        </label>
                    </div>
                </div>

                <div class="flex justify-end">
                    <a href="{{ route('notices.index') }}"
                        class="bg-slate-500 hover:bg-slate-600 text-white font-bold py-2 px-4 rounded transition-colors mr-2">Cancel</a>
                    <button type="submit"
                        class="bg-orange-600 hover:bg-orange-700 text-white font-bold py-2 px-4 rounded transition-colors">Update
                        Notice</button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
