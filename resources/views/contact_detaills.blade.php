<x-app-layout>
    <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">

        <div class="mb-6">
            <h2 class="text-2xl font-semibold text-slate-800">Lamor India Pvt Ltd Contact Details</h2>
        </div>

        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
            
            <div class="grid grid-cols-1 gap-6">

                <!-- Name -->
                <div>
                    <label class="block text-sm font-medium text-slate-700">Contact Person</label>
                    <p class="mt-1 text-slate-900 font-semibold">Mr. Sanjay Sharma</p>
                </div>

                <!-- Mobile -->
                <div>
                    <label class="block text-sm font-medium text-slate-700">Mobile Number</label>
                    <p class="mt-1 text-slate-900 font-semibold">
                        +91 8800891867 / 8369342508
                    </p>
                </div>

                <!-- Email -->
                <div>
                    <label class="block text-sm font-medium text-slate-700">Email Address</label>
                    <p class="mt-1 text-slate-900 font-semibold">
                        sanjay.sharma@lamor.com
                    </p>
                </div>

                <!-- Address -->
                <div>
                    <label class="block text-sm font-medium text-slate-700">Office Address</label>
                    <p class="mt-1 text-slate-900 font-semibold">
                        701-702, 7th Floor, A-Wing, Arihant Aura <br>
                        Plot D/13/1, TTC MIDC Road, Turbhe MIDC <br>
                        Turbhe, Navi Mumbai, Maharashtra 400703, India
                    </p>
                </div>

                <!-- Website -->
                <div>
                    <label class="block text-sm font-medium text-slate-700">Website</label>
                    <a href="https://www.lamor.com" target="_blank"
                        class="mt-1 text-orange-600 font-semibold hover:underline">
                        www.lamor.com
                    </a>
                </div>

            </div>

            <!-- Button -->
            <div class="flex justify-end mt-6">
                <a href="{{ url()->previous() }}"
                    class="bg-slate-500 hover:bg-slate-600 text-white font-bold py-2 px-4 rounded">
                    Back
                </a>
            </div>

        </div>
    </div>
</x-app-layout>