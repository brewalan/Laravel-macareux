<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            @lang('Show a personne')
        </h2>
    </x-slot>

    <x-personnes-card>
        <h3 class="font-semibold text-xl text-gray-800">@lang('First name')</h3>
        <p>{{ $personne->firstName }}</p>
        <h3 class="font-semibold text-xl text-gray-800 pt-2">@lang('Last name')</h3>
        <p>{{ $personne->lastName }}</p>
        <h3 class="font-semibold text-xl text-gray-800 pt-2">@lang('Active')</h3>
        <p>
          @if($personne->active)
            @lang('Yes')
          @else
            @lang('No')
          @endif
        </p>
        <h3 class="font-semibold text-xl text-gray-800 pt-2">@lang('Favorite')</h3>
        <p>
          @if($personne->favorite)
            @lang('Yes')
          @else
            @lang('No')
          @endif
        </p>
        <h3 class="font-semibold text-xl text-gray-800 pt-2">@lang('Date creation')</h3>
        <p>{{ $personne->created_at->format('d/m/Y') }}</p>
        @if($personne->created_at != $personne->updated_at)
          <h3 class="font-semibold text-xl text-gray-800 pt-2">@lang('Last update')</h3>
          <p>{{ $personne->updated_at->format('d/m/Y') }}</p>
        @endif
    </x-personnes-card>
</x-app-layout>