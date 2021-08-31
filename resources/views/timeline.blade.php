<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Timeline') }}
        </h2>
    </x-slot>

    <x-container>
        <div class="grid grid-cols-12 gap-5">
            <div class="col-span-7">

                {{-- post card --}}
                <x-card>
                    <form action="{{ route('status.store') }}" method="POST">
                        @csrf
                        <div class="flex">
                            <div class="flex-shrink-0 mr-3">
                                <img class="w-10 h-10 rounded-full" src="{{ Auth::user()->gravatar() }}" alt="{{ Auth::user()->name }}">
                            </div>
                            <div class="w-full">
                                <div class="font-semibold">{{ Auth::user()->name }}</div>
                                <div class="my-3">
                                    <textarea name="body" id="body"
                                    placeholder="what is on your mind?"
                                    class="w-full transition duration-200 border-gray-300 resize-none form-textarea rounded-xl focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-offset-1"></textarea>
                                </div>
                                <div class="text-right">
                                    <x-button>Post</x-button>
                                </div>
                            </div>
                        </div>
                    </form>
                </x-card>

                {{-- timeline card --}}
                <div class="mt-7 space-y-7">
                    <div class="space-y-5">
                        @foreach ($status as $status)
                            <x-card>
                                <div class="flex">
                                    <div class="flex-shrink-0 mr-3">
                                        <img class="w-10 h-10 rounded-full" src="{{ $status->author->gravatar() }}" alt="{{ $status->author->name }}">
                                    </div>
                                    <div>
                                        <div class="font-semibold">{{ $status->author->name }}</div>
                                        <div class="leading-relaxed">{{ $status->body }}</div>
                                        <div class="text-sm text-gray-500">{{ $status->created_at->diffForHumans() }}</div>
                                    </div>
                                </div>
                            </x-card>
                        @endforeach
                    </div>
                </div>
            </div>

            {{-- following list --}}
            <div class="col-span-5">
                <x-card>
                    <h1 class="mb-5 font-semibold">Recently Follows</h1>
                    <div class="space-y-5">
                        @forelse (Auth::user()->followed()->limit(3)->get() as $user)
                            <div class="flex items-center">
                                <div class="flex-shrink-0 mr-3">
                                    <img class="w-10 h-10 rounded-full" src="{{ $user->gravatar() }}" alt="{{ $status->author->name }}">
                                </div>
                                <div>
                                    <div class="font-semibold">{{ $user->name }}</div>
                                    <div class="text-sm text-gray-500">
                                        {{ $user->pivot->created_at->diffForHumans() }}
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="w-full p-2 text-base antialiased italic text-gray-700 bg-green-300 border border-green-300 rounded-md bg-opacity-30">
                                you are not following anyone yet
                            </div>
                        @endforelse
                    </div>
                </x-card>
            </div>
        </div>
    </x-container>

</x-app-layout>
