<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create a personne') }}
        </h2>
    </x-slot>

    <x-personnes-card>

        <!-- Erreurs de validation -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <!-- Message de réussite -->
        @if (session()->has('message'))
            <div class="mt-3 mb-4 list-disc list-inside text-sm text-green-600">
                {{ session('message') }}
            </div>
        @endif

        <form action="{{ route('personnes.store') }}" method="post">
            @csrf

            <!-- Prénom -->
            <div>
                <x-label for="firstName" :value="__('First name')" />

                <x-input id="firstName" class="block mt-1 w-full" type="text" name="firstName" :value="old('First name')" required autofocus />
            </div>

            <!-- Nom -->
            <div>
                <x-label for="lastName" :value="__('Last name')" />

                <x-input id="lastName" class="block mt-1 w-full" type="text" name="lastName" :value="old('Last name')" required autofocus />
            </div>            

            <!-- Active -->
            <div>
                <x-label for="activeBox" :value="__('Active')" />

                <x-input id="activeBox" class="block mt-1" type="checkbox" name="activeBox" :value="old('Active')" checked />
            </div>  

            <!-- Favori -->
            <div>
                <x-label for="favoriteBox" :value="__('Favorite')" />

                <x-input id="favoriteBox" class="block mt-1" type="checkbox" name="favoriteBox" :value="old('Favorite')" />
            </div>  

            <div class="flex items-center justify-end mt-4">
                <x-button class="ml-3">
                    {{ __('Send') }}
                </x-button>
            </div>
        </form>

    </x-personnes-card>
</x-app-layout>