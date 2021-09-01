<x-app-layout>
    <x-slot name="header">
        <h1 class="text-xl antialiased">
            Update Your Profile
        </h1>
    </x-slot>

    <x-container>
        <div class="flex">
            <div class="w-full lg:w-1/2">
                <x-card>
                    <form action="{{ route('profile.update') }}" method="post">
                        @csrf
                        @method('patch')

                        <div class="mb-5">
                            <x-label for="username">Username</x-label>
                            <x-input value="{{ old('username', Auth::user()->username) }}" class="w-full mt-2" type="text" name="username" id="username" />
                            <x-input-error :name="'username'" />
                        </div>

                        <div class="mb-5">
                            <x-label for="email">Email</x-label>
                            <x-input value="{{ old('email', Auth::user()->email) }}" class="w-full mt-2" type="email" name="email" id="email" />
                            <x-input-error :name="'email'" />
                        </div>

                        <div class="mb-5">
                            <x-label for="name">Name</x-label>
                            <x-input value="{{ old('name', Auth::user()->name) }}" class="w-full mt-2" type="text" name="name" id="name" />
                            <x-input-error :name="'name'" />
                        </div>

                        <x-button>submit</x-button>
                    </form>
                </x-card>
            </div>
        </div>
    </x-container>
</x-app-layout>
