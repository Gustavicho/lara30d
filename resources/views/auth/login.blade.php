<x-layout>
    <x-slot:heading>
        Log in
    </x-slot:heading>

    <form method="POST" action="/login">
        @csrf

        <div class="space-y-12">
            <div class="border-b border-gray-900/10 pb-12">
                <div class="grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                    <x-form-field>
                        <x-form-label>Email</x-form-label>
                        <div class="mt-2">
                            <x-form-input name="email" id="email" type="email" value="{{ old('email') }}"
                                required />

                            <x-form-error name="email" />
                        </div>
                    </x-form-field>

                    <x-form-field>
                        <x-form-label>Password</x-form-label>
                        <div class="mt-2">
                            <x-form-input name="pwd" id="pwd" type="password" value="{{ old('pwd') }}"
                                required />

                            <x-form-error name="pwd" />
                        </div>
                    </x-form-field>
                </div>
            </div>
        </div>

        <div class="mt-6 flex items-center justify-end gap-x-6">
            <a href="/" class="text-sm font-semibold leading-6 text-gray-900">Cancel</a>
            <x-form-button>Log in</x-form-button>
        </div>
    </form>

</x-layout>
