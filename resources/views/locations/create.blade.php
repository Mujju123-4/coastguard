<x-app-layout>
    <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
        <div class="mb-6">
            <h2 class="text-2xl font-semibold text-slate-800">Add New Location</h2>
        </div>

        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
            <form action="{{ route('locations.store') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="name" class="block text-sm font-medium text-slate-700">Location Name</label>
                    <input type="text" name="name" id="name" value="{{ old('name') }}" required
                        class="mt-1 block w-full border-slate-300 rounded-md shadow-sm focus:ring-orange-500 focus:border-orange-500">
                    @error('name')
                        <p class="text-red-600 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex justify-end">
                    <a href="{{ route('locations.index') }}" class="bg-slate-500 hover:bg-slate-600 text-white font-bold py-2 px-4 rounded transition-colors mr-2">Cancel</a>
                    <button type="submit" class="bg-orange-600 hover:bg-orange-700 text-white font-bold py-2 px-4 rounded transition-colors">Create Location</button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
