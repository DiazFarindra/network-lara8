<x-app-layout>
    <div class="-mt-8 border-b py-14">
        <x-container>
            <div class="flex items-center justify-between">
                <div class="flex">
                    <div class="flex-shrink-0 mr-3">
                        <img src="{{ $user->gravatar() }}" alt="{{ $user->name }}" class="w-20 h-20 p-1 border-2 border-indigo-500 rounded-full">
                    </div>
                    <div class="mt-2">
                        <h1 class="mb-2 font-semibold">{{ $user->name }}</h1>
                        <div class="text-sm text-gray-500">
                            joined {{ $user->created_at->diffForHumans() }}
                        </div>
                    </div>
                </div>
                <div class="flex text-gray-800 space-x-7">
                    <div class="p-5 font-semibold text-center">
                        <div class="text-xs uppercase">status</div>
                        <div class="text-2xl font-bold">{{ $user->status()->count() }}</div>
                    </div>
                    <div class="p-5 font-semibold text-center">
                        <div class="text-xs uppercase">followers</div>
                        <div class="text-2xl font-bold">{{ $user->followers()->count() }}</div>
                    </div>
                    <div class="p-5 font-semibold text-center">
                        <div class="text-xs uppercase">following</div>
                        <div class="text-2xl font-bold">{{ $user->followed()->count() }}</div>
                    </div>
                </div>
            </div>
        </x-container>
    </div>
    <x-container class="mt-5">
        <div class="grid grid-cols-2">
            <div class="space-y-5">
                <h1 class="text-3xl antialiased">your status</h1>
                <x-status-card :status="$status" />
            </div>
        </div>
    </x-container>
</x-app-layout>
