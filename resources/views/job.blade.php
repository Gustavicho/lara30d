<x-layout>
    <x-slot:heading>
        {{ $job->title }}
    </x-slot:heading>

    <p>
        The current salary is U${{ number_format($job->salary, 2) }} per yera, in
        <strong>{{ $job->employer->name }}</strong> !
    </p>
</x-layout>
