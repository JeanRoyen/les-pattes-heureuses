@props([
    'species' => [],
    'breeds' => [],
])

<div class="grid grid-cols-8 gap-5">
    <x-general.select name="species" title="Espèces" wire:model.live="filterSpecie">
        <option value="">Toutes les espèces</option>
        @foreach($species as $specie)
            <option value="{{ $specie->id }}">{{ ucfirst($specie->name) }}</option>
        @endforeach
    </x-general.select>

    <x-general.select name="breed" title="Races" wire:model.live="filterRace">
        <option value="">Toutes les races</option>
        @foreach($breeds as $breed)
            <option value="{{ $breed->id }}">{{ ucfirst($breed->name) }}</option>
        @endforeach
    </x-general.select>

    <x-general.select name="gender" title="Sexe" wire:model.live="filterGender">
        <option value="">Tous</option>
        <option value="1">Mâle</option>
        <option value="0">Femelle</option>
    </x-general.select>

    <x-general.select name="status" title="Statut" wire:model.live="filterStatus">
        <option value="">Tous les statuts</option>
        <option value="available">Disponible</option>
        <option value="in_care">En soin</option>
        <option value="waiting">En attente</option>
        <option value="adopted">Adopté</option>
    </x-general.select>
</div>
