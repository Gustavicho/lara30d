@props(['name'])

@error($name)
    <p class="text-xs text-red-500 italic">{{ $message }}</p>
@enderror
