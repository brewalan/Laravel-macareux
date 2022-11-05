<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit a personne') }}
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

        <form action="{{ route('personnes.update', $personne->id) }}" method="post">
            @csrf
            @method('put')

            <!-- First name -->
            <div>
                <x-label for="firstName" :value="__('First name')" />

                <x-input id="firstName" class="block mt-1 w-full" type="text" name="firstName" :value="old('firstName', $personne->firstName)" required autofocus />
            </div>

            <!-- Last name -->
            <div>
                <x-label for="lastName" :value="__('Last name')" />

                <x-input id="lastName" class="block mt-1 w-full" type="text" name="lastName" :value="old('lastName', $personne->lastName)" required autofocus />
            </div>

            <!-- Active -->
            <div>
                <x-label for="activeBox" :value="__('Active')" />

                <x-input id="activeBox" class="block mt-1" type="checkbox" name="activeBox" :value="old('active')" @if(old('activeBox', $personne->active)) checked @endif />
            </div>  

            <!-- Favori -->
            <div>
                <x-label for="favoriteBox" :value="__('Favorite')" />

                <x-input id="favoriteBox" class="block mt-1" type="checkbox" name="favoriteBox" :value="old('favorite')" @if(old('favoriteBox', $personne->favorite)) checked @endif />
            </div>  

            <div class="flex items-center justify-end mt-4">
                <x-button class="ml-3">
                    {{ __('Send') }}
                </x-button>
            </div>
        </form>

    </x-personnes-card>
</x-app-layout>