<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>
        <div class="mt-4">
            <label for="asChauffeur" class="inline-flex items-center">
                <input id="organisateur" type="checkbox" class="form-checkbox" name="organisator">
                <span class="ml-2">{{ __('Register as organisator') }}</span>
            </label>
        </div>
        <br>
        <div class="mt-4 organisator" style="display:none;">
        <div class="mt-4">
                <x-input-label for="type_paiement" :value="__('mode acceptation reservation')" />
                <select id="type_paiement" class="block mt-1 w-full" name="type_paiement">
                    <option value="automatique">automatique</option>
                    <option value="manuel">manuel</option>
                </select>
                <x-input-error :messages="$errors->get('type_paiement')" class="mt-2" />
            </div>

    </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var asChauffeurCheckbox = document.getElementById('organisateur');
            var chauffeurFieldsDiv = document.querySelector('.organisator');

            asChauffeurCheckbox.addEventListener('change', function() {
                if (asChauffeurCheckbox.checked) {
                    chauffeurFieldsDiv.style.display = 'block';
                } else {
                    chauffeurFieldsDiv.style.display = 'none';
                }
            });
        });
    </script>
</x-guest-layout>