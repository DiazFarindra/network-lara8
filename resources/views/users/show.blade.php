<x-app-layout>
    <x-slot name="header">
        <h1 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __($user->name) }}
        </h1>
    </x-slot>
</x-app-layout>
