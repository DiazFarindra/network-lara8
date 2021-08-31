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
                        <x-status-card :status="$status" />
                    </div>
                </div>
            </div>

            {{-- following list --}}
            <div class="col-span-5">
                <x-card>
                    <h1 class="mb-5 font-semibold">Recently Follows</h1>
                    <div class="space-y-5">
                        <x-followers-card :users="Auth::user()->followed()->limit(3)->get()" />
                    </div>
                </x-card>
            </div>
        </div>
    </x-container>

</x-app-layout>
