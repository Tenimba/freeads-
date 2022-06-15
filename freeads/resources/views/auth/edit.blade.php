<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('info.update') }}">
            @csrf

            <!-- Password Reset Token -->
            <input type="hidden" name="token">
 <!-- Name -->
 <div>
                <x-label for="name" :value="__('Name')" />

                <x-input id="name" class="block mt-1 w-full" type="text" name="name" required autofocus />
            </div>

       

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Password')" />

                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required />
            </div>

                 <!-- Email Address -->
                 <div>
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" required autofocus />
            </div>

            <!-- Confirm Password -->
       
            <div class="flex items-center justify-end mt-4">
                <x-button>
                    {{ __('Reset ') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
