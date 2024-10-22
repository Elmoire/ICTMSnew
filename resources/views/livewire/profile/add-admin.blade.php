<x-action-section>
    <x-slot name="title">
        {{ __('New Admin') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Add new additional Admin that can approve the requests.') }}
    </x-slot>

    <x-slot name="content">
        <!-- Display Flash Messages -->
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <!-- Add New Admin Form -->
        <x-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('register') }}">
            @csrf
            <div>
                <x-label for="name" value="{{ __('Name') }}" />
                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            </div>

            <div class="mt-4">
                <x-label for="email" value="{{ __('Email') }}" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username"/>
                <span id="email-error" class="text-red-500 text-sm hidden">Invalid email domain. Must be @dswd.gov.ph</span>
            </div>

            <div class="mt-4">
                <x-label for="password" value="{{ __('Password') }}" />
                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                <x-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-button class="ms-4">
                    {{ __('Register') }}
                </x-button>
            </div>
        </form>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const emailInput = document.getElementById('email');
                const emailError = document.getElementById('email-error');
                const emailPattern = /^[a-zA-Z0-9._%+-]+@dswd\\.gov\\.ph$/;

                emailInput.addEventListener('input', function() {
                    if (emailPattern.test(emailInput.value)) {
                        emailError.classList.add('hidden');
                        emailInput.setCustomValidity('');
                    } else {
                        emailError.classList.remove('hidden');
                        emailInput.setCustomValidity('Invalid email domain. Must be @dswd.gov.ph');
                    }
                });

                // Handle form submission errors
                const form = emailInput.closest('form');
                form.addEventListener('submit', function(event) {
                    if (!emailPattern.test(emailInput.value)) {
                        event.preventDefault();
                        emailError.classList.remove('hidden');
                    }
                });
            });
        </script>
    </x-slot>
</x-action-section>
