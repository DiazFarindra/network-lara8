@props(['name'])

@error($name)
    <small class="mt-1 text-sm text-red-500">{{ $message }}</small>
@enderror
