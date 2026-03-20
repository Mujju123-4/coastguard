<x-app-layout>
    <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
        <div class="mb-6">
            <h2 class="text-2xl font-semibold text-slate-800">Add New Notice</h2>
        </div>

        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
            <form action="{{ route('notices.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="grid grid-cols-1 gap-6 mb-6">
                    <div>
                        <label for="title" class="block text-sm font-medium text-slate-700">Notice Title</label>
                        <input type="text" name="title" id="title" value="{{ old('title') }}"
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
                                <option value="General">General</option>
                                {{-- <option value="FAQ">FAQ</option> --}}
                                <option value="Important">Important</option>
                                <option value="Circular">Circular</option>
                            </select>
                            @error('category')
                                <p class="text-red-600 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label for="published_at" class="block text-sm font-medium text-slate-700">Publish Date &
                                Time (Optional)</label>
                            <input type="datetime-local" name="published_at" id="published_at"
                                value="{{ old('published_at') }}"
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
                            class="mt-1 block w-full border-slate-300 rounded-md shadow-sm focus:ring-orange-500 focus:border-orange-500">{{ old('content') }}</textarea>
                        @error('content')
                            <p class="text-red-600 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="file" class="block text-sm font-medium text-slate-700">Upload Attachment (PDF,
                            Image, etc.)</label>
                        <input type="file" name="file" id="file"
                            class="mt-1 block w-full border border-slate-300 rounded-md shadow-sm focus:ring-orange-500 focus:border-orange-500 p-2">
                        <p class="text-slate-500 text-xs mt-1 text-bold">Max size: 2MB. Supported formats: PDF, JPG,
                            PNG, DOCX</p>
                        @error('file')
                            <p class="text-red-600 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="inline-flex items-center cursor-pointer">
                            <input type="hidden" name="is_active" value="0">
                            <input type="checkbox" name="is_active" value="1"
                                class="rounded border-slate-300 text-orange-600 shadow-sm focus:ring-orange-500"
                                checked>
                            <span class="ml-2 text-sm text-slate-600 font-bold">Mark as Active</span>
                        </label>
                    </div>
                </div>

                <div class="flex justify-end">
                    <a href="{{ route('notices.index') }}"
                        class="bg-slate-500 hover:bg-slate-600 text-white font-bold py-2 px-4 rounded transition-colors mr-2">Cancel</a>
                    <button type="submit"
                        class="bg-orange-600 hover:bg-orange-700 text-white font-bold py-2 px-4 rounded transition-colors">Create
                        Notice</button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
