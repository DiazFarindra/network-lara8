<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Timeline') }}
        </h2>
    </x-slot>

    <x-container>
        <div class="grid grid-cols-12 gap-5">
            <div class="col-span-7">
                <div class="space-y-8">
                    @foreach ($status as $status)
                        <div class="p-5 border shadow rounded-xl">
                            <div class="flex">
                                <div class="flex-shrink-0 mr-3">
                                    <img class="w-10 h-10 rounded-full" src="https://i.pravatar.cc/150" alt="{{ $status->author->name }}">
                                </div>
                                <div>
                                    <div class="font-semibold">{{ $status->author->name }}</div>
                                    <div class="leading-relaxed">{{ $status->body }}</div>
                                    <div class="text-sm text-gray-500">{{ $status->created_at->diffForHumans() }}</div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="col-span-5">
                <div class="p-5 border shadow rounded-xl">
                    <h1 class="mb-5 font-semibold">Recently Follows</h1>
                    <div class="space-y-5">
                        @forelse (Auth::user()->followed()->limit(3)->get() as $user)
                            <div class="flex items-center">
                                <div class="flex-shrink-0 mr-3">
                                    <img class="w-10 h-10 rounded-full" src="https://i.pravatar.cc/150" alt="{{ $status->author->name }}">
                                </div>
                                <div>
                                    <div class="font-semibold">{{ $user->name }}</div>
                                    <div class="text-sm text-gray-500">
                                        {{ $user->pivot->created_at->diffForHumans() }}
                                    </div>
                                </div>
                            </div>
                        @empty
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </x-container>

</x-app-layout>
