@php use Carbon\Carbon; @endphp
@props([
    'animals'=> collect()
])

@forelse($animals as $animal)
    <tr wire:key="adopted-{{ $animal->id }}">
        <x-table.table-data title="{{ $animal->name }}"/>
        <x-table.table-data title="{{ $animal->specie->name }}"/>
        <x-table.table-data title="{{ $animal->breed->name }}"/>
        <x-table.table-data title="{{ $animal->gender ? 'Mâle' : 'Femelle' }}"/>
        <x-table.table-data title="{{ $animal->age->format('d/m/Y') }}"/>
        <x-table.table-data title="{{ $animal->vaccine ? 'À jour' : 'À faire' }}"/>
        <x-table.table-data title="{{ __('animals.status_' . $animal->status) }}"/>
        <x-table.table-data title="{{ $animal->created_at->format('d/m/Y') }}"/>
        <td class="border py-2 bg-white space-x-2">
            @can('update', $animal)
                <button
                    class="bg-blue-400  text-white py-1 px-3 mb-1 rounded-button hover:cursor-pointer hover:bg-blue-500"
                    wire:click="showAnimal({{ $animal->id }})">Voir la fiche
                </button>
            @else
                <p>Consulter l'administrateur</p>
            @endcan
        </td>
    </tr>
@empty
    <tr>
        <td colspan="9" class="text-center py-4 bg-white border">Pas d'animaux trouvés</td>
    </tr>
@endforelse
