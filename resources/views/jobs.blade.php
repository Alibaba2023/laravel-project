<x-layout>
    <x-slot:heading>
        Jobs listing
    </x-slot:heading>
    <ul>

        @foreach ($jobs as $job)
            <li class="bg-green-200 p-2 m-2 rounded-lg hover:bg-green-300">
                <a href="/jobs/{{ $job['id'] }}">
                    The tital of the job: {{ $job['title'] }}.The salary of the job: {{ $job['salary'] }}
                </a>
            </li>
        @endforeach
    </ul>
</x-layout>
