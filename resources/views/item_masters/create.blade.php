<x-app-layout>
    <div class="max-w-4xl mx-auto py-10 sm:px-6 lg:px-8">
        <div class="mb-6">
            <h2 class="text-2xl font-semibold text-slate-800">Add New Item</h2>
        </div>

        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
            <form action="{{ route('item-masters.store') }}" method="POST">
                @csrf
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="mb-4">
                        <label for="location_id" class="block text-sm font-medium text-slate-700">Location</label>
                        <select name="location_id" id="location_id" required
                            class="mt-1 block w-full border-slate-300 rounded-md shadow-sm focus:ring-orange-500 focus:border-orange-500">
                            <option value="">Select Location</option>
                            @foreach($locations as $location)
                                <option value="{{ $location->id }}" {{ old('location_id') == $location->id ? 'selected' : '' }}>
                                    {{ $location->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('location_id')
                            <p class="text-red-600 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="code" class="block text-sm font-medium text-slate-700">Code</label>
                        <input type="text" name="code" id="code" value="{{ old('code') }}" required
                            class="mt-1 block w-full border-slate-300 rounded-md shadow-sm focus:ring-orange-500 focus:border-orange-500">
                        @error('code')
                            <p class="text-red-600 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="serial_no" class="block text-sm font-medium text-slate-700">Serial No</label>
                        <input type="text" name="serial_no" id="serial_no" value="{{ old('serial_no') }}"
                            class="mt-1 block w-full border-slate-300 rounded-md shadow-sm focus:ring-orange-500 focus:border-orange-500">
                        @error('serial_no')
                            <p class="text-red-600 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="qty" class="block text-sm font-medium text-slate-700">Quantity</label>
                        <input type="number" name="qty" id="qty" value="{{ old('qty', 0) }}" required min="0"
                            class="mt-1 block w-full border-slate-300 rounded-md shadow-sm focus:ring-orange-500 focus:border-orange-500">
                        @error('qty')
                            <p class="text-red-600 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="uom" class="block text-sm font-medium text-slate-700">UoM</label>
                        <select name="uom" id="uom" required
                            class="mt-1 block w-full border-slate-300 rounded-md shadow-sm focus:ring-orange-500 focus:border-orange-500">
                            <option value="">Select UoM</option>
                            @foreach($uoms as $uom)
                                <option value="{{ $uom }}" {{ old('uom') == $uom ? 'selected' : '' }}>
                                    {{ $uom }}
                                </option>
                            @endforeach
                        </select>
                        @error('uom')
                            <p class="text-red-600 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="serviced_date" class="block text-sm font-medium text-slate-700">Serviced Date</label>
                        <input type="date" name="serviced_date" id="serviced_date" value="{{ old('serviced_date') }}"
                            class="mt-1 block w-full border-slate-300 rounded-md shadow-sm focus:ring-orange-500 focus:border-orange-500">
                        @error('serviced_date')
                            <p class="text-red-600 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="mb-4">
                    <label for="equipment" class="block text-sm font-medium text-slate-700">Equipment / Name</label>
                    <textarea name="equipment" id="equipment" rows="3" required
                        class="mt-1 block w-full border-slate-300 rounded-md shadow-sm focus:ring-orange-500 focus:border-orange-500">{{ old('equipment') }}</textarea>
                    @error('equipment')
                        <p class="text-red-600 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!--<div class="mb-6">-->
                <!--    <label class="block text-sm font-medium text-slate-700 mb-2">Item Status</label>-->
                <!--    <div class="flex items-center space-x-6">-->
                <!--        <label class="inline-flex items-center cursor-pointer">-->
                <!--            <input type="radio" name="status" value="operational" {{ old('status', 'operational') == 'operational' ? 'checked' : '' }}-->
                <!--                class="form-radio text-green-600 focus:ring-green-500 border-slate-300 transition-all hover:border-green-400"-->
                <!--                onclick="toggleReason(false)">-->
                <!--            <span class="ml-2 text-sm font-semibold text-slate-700">Operational</span>-->
                <!--        </label>-->
                <!--        <label class="inline-flex items-center cursor-pointer">-->
                <!--            <input type="radio" name="status" value="non-operational" {{ old('status') == 'non-operational' ? 'checked' : '' }}-->
                <!--                class="form-radio text-rose-600 focus:ring-rose-500 border-slate-300 transition-all hover:border-rose-400"-->
                <!--                onclick="toggleReason(true)">-->
                <!--            <span class="ml-2 text-sm font-semibold text-slate-700">Non-operational</span>-->
                <!--        </label>-->
                <!--    </div>-->
                <!--    @error('status')-->
                <!--        <p class="text-red-600 text-xs mt-1">{{ $message }}</p>-->
                <!--    @enderror-->
                <!--</div>-->

                <div class="mb-4 {{ old('status') == 'non-operational' ? '' : 'hidden' }}" id="reason-container">
                    <label for="status_reason" class="block text-sm font-medium text-slate-700 italic">Reason for Non-operational status</label>
                    <textarea name="status_reason" id="status_reason" rows="2"
                        placeholder="Please explain why the item is non-operational..."
                        class="mt-1 block w-full border-slate-300 rounded-md shadow-sm focus:ring-rose-500 focus:border-rose-500 bg-rose-50/30 text-slate-800 placeholder-slate-400">{{ old('status_reason') }}</textarea>
                    @error('status_reason')
                        <p class="text-red-600 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <script>
                    function toggleReason(show) {
                        const container = document.getElementById('reason-container');
                        const textarea = document.getElementById('status_reason');
                        if (show) {
                            container.classList.remove('hidden');
                            textarea.focus();
                        } else {
                            container.classList.add('hidden');
                        }
                    }
                </script>

                <div class="flex justify-end">
                    <a href="{{ route('item-masters.index') }}" class="bg-slate-500 hover:bg-slate-600 text-white font-bold py-2 px-4 rounded transition-colors mr-2">Cancel</a>
                    <button type="submit" class="bg-orange-600 hover:bg-orange-700 text-white font-bold py-2 px-4 rounded transition-colors">Create Item</button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
