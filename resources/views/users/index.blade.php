<x-app-layout>
    <x-container>
        <div class="grid grid-cols-4 gap-3">
            <x-followers-card :users="$users" />
        </div>

        <div class="mt-6">
            {{ $users->links() }}
        </div>
    </x-container>
</x-app-layout>
