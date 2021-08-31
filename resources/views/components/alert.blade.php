<x-container>
    @if (session('success'))
        <div class="w-full p-2 mb-1 text-base antialiased italic text-gray-700 bg-green-300 border border-green-300 rounded-md bg-opacity-30">
            {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div class="w-full p-2 mb-1 text-base antialiased italic text-gray-700 bg-red-300 border border-red-300 rounded-md bg-opacity-30">
            {{ session('error') }}
        </div>
    @endif
</x-container>
