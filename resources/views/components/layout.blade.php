<!DOCTYPE html>
<html lang="en" class="h-full bg-gray-100">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $heading }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="h-full">
    <div class="min-h-full">
        <nav class="bg-gray-800">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <div class="flex h-16 items-center justify-between">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <img class="h-8 w-8" src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=500"
                                alt="Your Company">
                        </div>
                        <div class="hidden md:block">
                            <div class="ml-10 flex items-baseline space-x-4">
                                <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
                                <x-nav--link href="/" :active="request()->is('/')">Home</x-nav--link>
                                <x-nav--link href="/jobs" :active="request()->is('jobs')">Jobs</x-nav--link>
                                <x-nav--link href="/contact" :active="request()->is('contact')">Contact</x-nav--link>
                            </div>
                        </div>
                    </div>

                    <div class="md:block">
                        <div class="ml-4 flex gap-4 items-center md:ml-6">
                            @guest
                                <x-nav--link href="/login" :active="request()->is('login')">Login</x-nav--link>
                                <x-nav--link href="/register" :active="request()->is('register')">Register</x-nav--link>
                            @endguest

                            @auth
                                <form method="POST" action="/logout">
                                    @csrf

                                    <x-form-button>Log out</x-form-button>
                                </form>
                            @endauth
                        </div>
                    </div>
                </div>
            </div>
        </nav>

        <header class="bg-white shadow">
            <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8 sm:flex sm:justify-between">
                <h1 class="text-3xl font-bold tracking-tight text-gray-900">{{ $heading }}</h1>

                <x-button href="/jobs/create">Create jobs</x-button>
            </div>
        </header>
        <main>
            <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
                <!-- Your content -->
                {{ $slot }}
            </div>
        </main>
    </div>

</body>

</html>
