<x-app-layout>
    <x-slot name="header">
        <h1 class="text-xl antialiased">
            Update Your Password
        </h1>
    </x-slot>

    <x-container>
        <div class="flex">
            <div class="w-full lg:w-1/2">
                <x-card>
                    <form action="{{ route('update.password') }}" method="post">
                        @csrf
                        @method('patch')

                        <div class="mb-5">
                            <x-label for="current_password">Current Password</x-label>
                            <x-input class="w-full mt-2" type="password" name="current_password" id="current_password" />
                            <x-input-error :name="'current_password'" />
                        </div>

                        <div class="mb-5">
                            <x-label for="password">New Password</x-label>
                            <x-input class="w-full mt-2" type="password" name="password" id="password" />
                            <x-input-error :name="'password'" />
                        </div>

                        <div class="mb-5">
                            <x-label for="password_confirmation">Confirm Password</x-label>
                            <x-input class="w-full mt-2" type="password" name="password_confirmation" id="password_confirmation" />
                            <x-input-error :name="'password_confirmation'" />
                        </div>

                        <x-button>submit</x-button>
                    </form>
                </x-card>
            </div>
        </div>
    </x-container>
</x-app-layout>
