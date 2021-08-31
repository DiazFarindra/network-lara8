@props(['users'])

@forelse ($users as $user)
    <x-card>
        <div class="flex items-center">
            <div class="flex-shrink-0 mr-3">
                <img class="w-10 h-10 rounded-full" src="{{ $user->gravatar() }}" alt="{{ $user->name }}">
            </div>
            <div>
                <a href="{{ route('profile', $user) }}" class="font-semibold">{{ $user->name }}</a>
                <div class="text-sm text-gray-500">
                    {{ $user->pivot->created_at->diffForHumans() }}
                </div>
            </div>
        </div>
    </x-card>
@empty
    <div class="w-full p-2 text-base antialiased italic text-gray-700 bg-green-300 border border-green-300 rounded-md bg-opacity-30">
        you are not following anyone yet
    </div>
@endforelse
