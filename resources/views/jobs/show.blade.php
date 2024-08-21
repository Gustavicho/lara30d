<x-layout>
    <x-slot:heading>
        Job
    </x-slot:heading>

    <p class="text-xl font-bold mt-4">
        {{ $job->title }}
    </p>

    <p class="ext-lg">
        The current salary is U${{ number_format($job->salary, 2) }} per yera, in
        <strong>{{ $job->employer->name }}</strong> !
    </p>

    @can('edit-job', $job)
        <div class="mt-4">
            <x-button href="/jobs/{{ $job->id }}/edit">Edit job</x-button>
        </div>
    @endcan
</x-layout>
