@props([
    'prefix',
    'species' => [],
    'races' => [],
])

<div class="grid grid-cols-8 gap-5">
    <x-general.select
        name="{{ $prefix }}_species"
        title="Espèces"
        wire:model.live="{{ $prefix }}Specie">
        <option value="">Choisir une espèce</option>
        @foreach($species as $specie)
            <option value="{{ $specie }}">
                {{ ucfirst($specie) }}
            </option>
        @endforeach
    </x-general.select>

    <x-general.select
        name="{{ $prefix }}_race"
        title="Races"
        wire:model.live="{{ $prefix }}Race">
        <option value="">Choisir une race</option>
        @foreach($races as $race)
            <option value="{{ $race }}">
                {{ ucfirst($race) }}
            </option>
        @endforeach
    </x-general.select>

    <x-general.select
        name="{{ $prefix }}_gender"
        title="Sexe"
        wire:model.live="{{ $prefix }}Gender">
        <option value="">Choisir un sexe</option>
        <option value="1">Mâle</option>
        <option value="0">Femelle</option>
    </x-general.select>

    <x-general.select
        name="{{ $prefix }}_age"
        title="Âge"
        wire:model.live="{{ $prefix }}AgeRange">
        <option value="">Choisir un âge</option>
        <option value="0-1">0 – 1 an</option>
        <option value="2-4">2 – 4 ans</option>
        <option value="5-7">5 – 7 ans</option>
        <option value="8-15">8 – 15 ans</option>
    </x-general.select>
</div>
