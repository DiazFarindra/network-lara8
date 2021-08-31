@props(['status'])
@foreach ($status as $status)
    <x-card>
        <div class="flex">
            <div class="flex-shrink-0 mr-3">
                <img class="w-10 h-10 rounded-full" src="{{ $status->author->gravatar() }}" alt="{{ $status->author->name }}">
            </div>
            <div>
                <a href="{{ route('profile', $status->author) }}" class="font-semibold">{{ $status->author->name }}</a>
                <div class="leading-relaxed">{{ $status->body }}</div>
                <div class="text-sm text-gray-500">{{ $status->created_at->diffForHumans() }}</div>
            </div>
        </div>
    </x-card>
@endforeach
