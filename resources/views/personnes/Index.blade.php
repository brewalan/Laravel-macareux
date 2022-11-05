<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            @lang('Personnes List')
        </h2>
    </x-slot>
    <div class="container flex justify-center mx-auto">
      <div class="flex flex-col">
          <div class="w-full">
              <div class="border-b border-gray-200 shadow pt-6">
                <table>
                  <thead class="bg-gray-50">
                    <tr>
                      <th class="px-2 py-2 text-xs text-gray-500">#</th>
                      <th class="px-2 py-2 text-xs text-gray-500">@lang('First name')</th>
                      <th class="px-2 py-2 text-xs text-gray-500">@lang('Last name')</th>
                      <th class="px-2 py-2 text-xs text-gray-500">@lang('Active')</th>
                      <th class="px-2 py-2 text-xs text-gray-500">@lang('Favorite')</th>
                      <th class="px-2 py-2 text-xs text-gray-500"></th>
                      <th class="px-2 py-2 text-xs text-gray-500"></th>
                      <th class="px-2 py-2 text-xs text-gray-500"></th>
                    </tr>
                  </thead>
                  <tbody class="bg-white">
                    @foreach($personnes as $personne)
                      <tr class="whitespace-nowrap">
                        <td class="px-4 py-4 text-sm text-gray-500">{{ $personne->id }}</td>
                        <td class="px-4 py-4">{{ $personne->firstName }}</td>
                        <td class="px-4 py-4">{{ $personne->lastName }}</td>
                        <td class="px-4 py-4">@if ($personne->active) {{ __('Yes') }} @else {{ __('No') }} @endif</td>
                        <td class="px-4 py-4">@if ($personne->favorite) {{ __('Yes') }} @else {{ __('No') }} @endif</td>

                        <x-link-button href="{{ route('personnes.show', $personne->id) }}">
                            @lang('Show')
                        </x-link-button>
                        <x-link-button href="{{ route('personnes.edit', $personne->id) }}">
                            @lang('Edit')
                        </x-link-button>

                        <x-link-button onclick="event.preventDefault(); document.getElementById('destroy{{ $personne->id }}').submit();">
                            @lang('Delete')
                        </x-link-button>
                        <form id="destroy{{ $personne->id }}" action="{{ route('personnes.destroy', $personne->id) }}" method="POST" style="display: none;">
                            @csrf
                            @method('DELETE')
                        </form>
                      </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
          </div>
      </div>

</x-app-layout>