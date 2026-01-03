<main class="flex-1 ml-64 space-y-10">
    <x-admin.section-spacing>
        <x-admin.headings2 title="Animaux au refuge"/>
        <x-general.searchbar model="availableSearch"/>
        <x-general.filters
            prefix="available"
            :species="$this->species"
            :races="$this->races"
        />
        <x-admin.table>
            <tr>
                <x-admin.table-header title="Nom"/>
                <x-admin.table-header title="Espèce"/>
                <x-admin.table-header title="Race"/>
                <x-admin.table-header title="Description"/>
                <x-admin.table-header title="Sexe"/>
                <x-admin.table-header title="Naissance"/>
                <x-admin.table-header title="Vaccins"/>
                <x-admin.table-header title="Status"/>
                <x-admin.table-header title="Action"/>
            </tr>
            @forelse($this->availableAnimals as $animal)
                <tr>
                    <x-admin.table-data title="{{ $animal->name }}"/>
                    <x-admin.table-data title="{{ $animal->specie }}"/>
                    <x-admin.table-data title="{{ $animal->race }}"/>
                    <x-admin.table-data title="{{ $animal->description }}"/>
                    <x-admin.table-data title="{{ $animal->gender ? 'Mâle' : 'Femelle' }}"/>
                    <x-admin.table-data title="{{ $animal->age->format('d/m/Y') }}"/>
                    <x-admin.table-data title="{{ $animal->vaccine ? 'À jour' : 'À faire' }}"/>
                    <x-admin.table-data title="{{ $animal->status }}"/>
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
                    {{-- TODO: Completer le formulaire de modification avec les anciennes données  --}}
                </tr>
            @empty
                <tr>
                    <td colspan="9" class="text-center py-4 bg-white border">Pas d'animaux trouvés</td>
                </tr>
            @endforelse
                <tr>
                    <td colspan="9" class="text-center">
                        {{ $this->availableAnimals->links('vendor.pagination.personal-paginate') }}
                    </td>
                </tr>
        </x-admin.table>
        {{-- TODO: Paginate --}}
        <x-admin.cta function="createAnimal" title="Ajouter un animal"/>
    </x-admin.section-spacing>
    <x-admin.section-spacing>
        <x-admin.headings2 title="Animaux en attente de validation"/>
        <x-general.searchbar model="waitingSearch"/>
        <x-general.filters
            prefix="waiting"
            :species="$this->species"
            :races="$this->races"
        />
        <x-admin.table>
            <tr>
                <x-admin.table-header title="Nom"/>
                <x-admin.table-header title="Espèce"/>
                <x-admin.table-header title="Race"/>
                <x-admin.table-header title="Description"/>
                <x-admin.table-header title="Sexe"/>
                <x-admin.table-header title="Naissance"/>
                <x-admin.table-header title="Vaccins"/>
                <x-admin.table-header title="Status"/>
                <x-admin.table-header title="Action"/>
            </tr>
            @forelse($this->waitingAnimals as $animal)
                <tr>
                    <x-admin.table-data title="{{ $animal->name }}"/>
                    <x-admin.table-data title="{{ $animal->specie }}"/>
                    <x-admin.table-data title="{{ $animal->race }}"/>
                    <x-admin.table-data title="{{ $animal->description }}"/>
                    <x-admin.table-data title="{{ $animal->gender ? 'Mâle' : 'Femelle' }}"/>
                    <x-admin.table-data title="{{ $animal->age->format('d/m/Y') }}"/>
                    <x-admin.table-data title="{{ $animal->vaccine ? 'À jour' : 'À faire' }}"/>
                    <x-admin.table-data title="{{ $animal->status }}"/>
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
            <tr>
                <td class="text-center" colspan="9">
                    {{ $this->waitingAnimals->links('vendor.pagination.personal-paginate') }}
                </td>
            </tr>
        </x-admin.table>
    </x-admin.section-spacing>
    <x-admin.section-spacing>
        <x-admin.headings2 title="Animaux adoptés"/>
        <x-general.searchbar model="adoptedSearch"/>
        <x-general.filters
            prefix="adopted"
            :species="$this->species"
            :races="$this->races"
        />
        <x-admin.table>
            <tr>
                <x-admin.table-header title="Nom"/>
                <x-admin.table-header title="Espèce"/>
                <x-admin.table-header title="Race"/>
                <x-admin.table-header title="Description"/>
                <x-admin.table-header title="Sexe"/>
                <x-admin.table-header title="Naissance"/>
                <x-admin.table-header title="Vaccins"/>
                <x-admin.table-header title="Status"/>
                <x-admin.table-header title="Action"/>
            </tr>
            @forelse($this->adoptedAnimals as $animal)
                <tr>
                    <x-admin.table-data title="{{ $animal->name }}"/>
                    <x-admin.table-data title="{{ $animal->specie }}"/>
                    <x-admin.table-data title="{{ $animal->race }}"/>
                    <x-admin.table-data title="{{ $animal->description }}"/>
                    <x-admin.table-data title="{{ $animal->gender ? 'Mâle' : 'Femelle' }}"/>
                    <x-admin.table-data title="{{ $animal->age->format('d/m/Y') }}"/>
                    <x-admin.table-data title="{{ $animal->vaccine ? 'À jour' : 'À faire' }}"/>
                    <x-admin.table-data title="{{ $animal->status }}"/>
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
            <tr>
                <td colspan="9" class="text-center">
                    {{ $this->adoptedAnimals->links('vendor.pagination.personal-paginate') }}
                </td>
            </tr>
        </x-admin.table>
        {{-- TODO: Paginate --}}
    </x-admin.section-spacing>
    <div class="{{ $showCreateAnimalModal ? 'block' : 'hidden' }}">
        <x-modal.modal>
            <x-slot:title>
                Ajouter un animal
                <button type="button" wire:click="toggleModal('createAnimal', 'close')">
                    <img src="{{ asset('svg/close.svg') }}" alt="close" height="30" width="30">
                </button>
            </x-slot:title>
            <x-slot:body>
                <x-modal.create_animal/>
            </x-slot:body>
        </x-modal.modal>
    </div>
    <div class="{{ $showEditAnimalModal ? 'block' : 'hidden' }}">
        <x-modal.modal>
            <x-slot:title>
                Modifier un animal
                <button type="button" wire:click="toggleModal('openEditModal', 'close')">
                    <img src="{{ asset('svg/close.svg') }}" alt="close" height="30" width="30">
                </button>
            </x-slot:title>
            <x-slot:body>
                <x-modal.edit_animal/>
            </x-slot:body>
        </x-modal.modal>
    </div>
</main>
