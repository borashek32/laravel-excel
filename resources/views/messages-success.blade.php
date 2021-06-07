@if (session()->has('success'))
    <div class="bg-white text-teal-900 px-4 py-3 shadow-md my-3" role="alert">
        <div class="flex text-center rounded-lg">
            <div>
                <p class="text-lg text-bold">{{ session('success') }}</p>
            </div>
        </div>
    </div>
@endif
