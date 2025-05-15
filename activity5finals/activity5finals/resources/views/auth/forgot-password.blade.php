
<x-guest-layout>
    <div class="max-w-md mx-auto mt-10 bg-white border border-secondary shadow-lg rounded-lg p-6">
        <h2 class="text-2xl font-bold text-secondary mb-4 text-center">Forgot Password</h2>

        <div class="mb-4 text-sm text-gray-700">
            {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
        </div>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <!-- Email Address -->
            <div>
                <x-input-label for="email" :value="__('Email')" class="text-secondary" />
                <x-text-input
                    id="email"
                    class="block mt-1 w-full border-secondary focus:ring-secondary focus:border-secondary"
                    type="email"
                    name="email"
                    :value="old('email')"
                    required
                    autofocus
                />
                <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-500" />
            </div>

            <div class="flex items-center justify-end mt-6">
                <x-primary-button class="bg-secondary hover:bg-primary text-white">
                    {{ __('Email Password Reset Link') }}
                </x-primary-button>
            </div>
        </form>
    </div>
</x-guest-layout>
