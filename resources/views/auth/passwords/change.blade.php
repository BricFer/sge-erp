<x-guest-layout>
    <form method="POST" action="{{ route('password.actualizar') }}">

        @csrf
        <!-- Current password -->
        <div class="mt-4">
            <x-input-label for="current_password" :value="__('Current Password')" />
            <x-text-input id="current_password" class="block mt-1 w-full" 
                          type="password" 
                          name="current_password" 
                          required 
                          autocomplete="current-password" />
            <x-input-error :messages="$errors->get('current_password')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
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

        <div class="flex items-center justify-end mt-4 gap-4">
            <x-primary-button>
                {{ __('Reset Password') }}
            </x-primary-button>
            
            <a href="{{ route('profile.show') }}">
                <x-secondary-button>
                    {{ __('Cancel') }}
                </x-secondary-button>
            </a>
        </div>

    </form>
</x-guest-layout>
