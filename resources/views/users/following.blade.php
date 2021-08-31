<x-app-layout>

    <x-profile-card :user="$user" />

    <x-container class="mt-5">
        <div class="grid grid-cols-3 gap-5">
            <x-followers-card :users="$followersData" />
        </div>
    </x-container>

</x-app-layout>
