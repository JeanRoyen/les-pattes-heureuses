@props([
    'animals'=> collect()
])

@forelse($animals as $animal)
    <tr wire:key="adopted-{{ $animal->id }}">
        <x-table.table-data title="{{ $animal->name }}"/>
        <x-table.table-data title="{{ $animal->specie }}"/>
        <x-table.table-data title="{{ $animal->race }}"/>
        <x-table.table-data title="{{ $animal->gender ? 'Mâle' : 'Femelle' }}"/>
        <x-table.table-data title="{{ $animal->age->format('d/m/Y') }}"/>
        <x-table.table-data title="{{ $animal->vaccine ? 'À jour' : 'À faire' }}"/>
        <x-table.table-data title="{{ $animal->status }}"/>
        <td class="border py-2 bg-white space-x-2">
            <button
                wire:click="openEditModal({{ $animal->id }})"
                class="bg-background-green text-white py-1 px-3 mb-1 rounded-button">
                Modifier
            </button>
            <button
                wire:click="deleteAnimal({{ $animal->id }})"
                wire:confirm="Êtes-vous sûr de vouloir supprimer {{ ucfirst($animal->name) }} ?"
                class="bg-red-600 hover:bg-red-700 text-white py-1 px-3 rounded-button">
                Supprimer
            </button>
        </td>
    </tr>
@empty
    <tr>
        <td colspan="9" class="text-center py-4 bg-white border">Pas d'animaux trouvés</td>
    </tr>
@endforelse
