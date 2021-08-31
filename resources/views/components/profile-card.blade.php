@props(['user'])

<div class="-mt-8 border-b py-14">
    <x-container>
        <div class="flex items-center justify-between">
            <div class="flex items-center">
                <div class="flex-shrink-0">
                    <img src="{{ $user->gravatar() }}" alt="{{ $user->name }}" class="w-20 h-20 p-1 border-2 border-indigo-500 rounded-full">
                </div>
                <div class="mx-5">
                    <a href="{{ route('profile', $user->username) }}" class="font-semibold">{{ $user->name }}</a>
                    <div class="mt-2 text-sm text-gray-500">
                        joined {{ $user->created_at->diffForHumans() }}
                    </div>
                </div>
                @if (Auth::user()->isNot($user))
                    <div>
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
                @else
                    <a href="" class="px-5 py-2 antialiased font-semibold transition duration-200 border-2 border-blue-400 rounded hover:text-white hover:bg-blue-400 focus:ring focus:ring-offset-1 focus:ring-blue-500">
                        edit profile
                    </a>
                @endif
            </div>
            <div class="flex text-gray-800 space-x-7">
                <a href="{{ route('profile', $user) }}" class="p-5 font-semibold text-center transition duration-200 hover:text-blue-700">
                    <div class="text-xs uppercase">status</div>
                    <div class="text-2xl font-bold">{{ $user->status()->count() }}</div>
                </a>
                <a href="{{ route('profile.followers', [$user, 'followers']) }}" class="p-5 font-semibold text-center transition duration-200 hover:text-blue-700">
                    <div class="text-xs uppercase">followers</div>
                    <div class="text-2xl font-bold">{{ $user->followers()->count() }}</div>
                </a>
                <a href="{{ route('profile.followers', [$user, 'following']) }}" class="p-5 font-semibold text-center transition duration-200 hover:text-blue-700">
                    <div class="text-xs uppercase">following</div>
                    <div class="text-2xl font-bold">{{ $user->followed()->count() }}</div>
                </a>
            </div>
        </div>
    </x-container>
</div>
