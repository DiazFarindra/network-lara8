@if (session('success'))
    <div class="w-full p-5 text-lg antialiased italic text-white bg-green-400">
        <x-container>
            {{ session('success') }}
        </x-container>
    </div>
@endif

@if (session('error'))
    <div class="w-full p-5 text-lg antialiased italic text-white bg-red-400">
        <x-container>
            {{ session('error') }}
        </x-container>
    </div>
@endif
