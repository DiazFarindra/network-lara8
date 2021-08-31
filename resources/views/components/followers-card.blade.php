@props(['users'])

@forelse ($users as $user)
    <x-card>
        <div class="flex items-center">
            <div class="flex-shrink-0 mr-3">
                <img class="w-10 h-10 rounded-full" src="{{ $user->gravatar() }}" alt="{{ $user->name }}">
            </div>

            <div>
                <a href="{{ route('profile', $user) }}" class="font-semibold">{{ $user->name }}</a>

                @if (request()->routeIs('users.index'))
                    <div class="mt-1">
                        <form action="{{ route('follows.store', $user) }}" method="post">
                            @csrf
                            <button type="submit"
                                class="px-5 py-1 antialiased font-semibold transition duration-200 border-2 border-blue-400 rounded hover:text-white hover:bg-blue-400 focus:ring focus:ring-offset-1 focus:ring-blue-500">
                                @if (Auth::user()->followed()->where('following_user_id', $user->id)->first())
                                    unfollow
                                @else
                                    follow
                                @endif
                            </button>
                        </form>
                    </div>
                @endif

                <div class="text-sm text-gray-500">
                    @if ($user->pivot)
                        {{ $user->pivot->created_at->diffForHumans() }}
                    @endif
                </div>
            </div>
        </div>
    </x-card>
@empty
    <div class="w-full p-2 text-base antialiased italic text-gray-700 bg-green-300 border border-green-300 rounded-md bg-opacity-30">
        you are not following anyone yet
    </div>
@endforelse
