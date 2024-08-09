<x-layout>
    <x-slot:heading>
        {{ $job['title'] }}
    </x-slot:heading>

    <p>
        In Brazil that's job pays R${{ $job['salary'] }} in a Month!
    </p>
</x-layout>
