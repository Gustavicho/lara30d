<x-layout>
    <x-slot:heading>
        Jobs
    </x-slot:heading>

    <h1 class="text-xl">
        Salarys in Brazil
    </h1>

    <ul>
        @foreach ($jobs as $job)
            <li>
                <a href="/jobs/{{ $job['id'] }}" class="text-blue-900 hover:underline">
                    {{ $job['title'] }}:
                </a>
                Pays R${{ $job['salary'] }} per month
            </li>
        @endforeach
    </ul>
</x-layout>
