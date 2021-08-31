<x-app-layout>

    <x-profile-card :user="$user" />

    <x-container class="mt-5">
        <div class="grid grid-cols-2">
            <div class="space-y-5">
                <h1 class="text-3xl antialiased">your status</h1>
                <x-status-card :status="$status" />
            </div>
        </div>
    </x-container>

</x-app-layout>
