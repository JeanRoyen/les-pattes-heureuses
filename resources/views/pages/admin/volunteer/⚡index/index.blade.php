<main class="flex-1 ml-64 space-y-10">
    <x-admin.section-spacing>
        <x-admin.headings2 title="Bénévoles du refuge"/>
        <x-admin.cta function="createUser" title="Ajouter un bénévole"/>
        <x-admin.table>
            <tr>
                <x-admin.table-header title="Nom"/>
                <x-admin.table-header title="Email"/>
                <x-admin.table-header title="Téléphone"/>
                <x-admin.table-header title="Rôle"/>
                <x-admin.table-header title="Actions"/>
            </tr>
            <x-general.searchbar model="volunteerSearch" />
            @foreach($this->users as $user)
                <tr>
                    <x-admin.table-data title="{{ ucfirst($user->name) }}"/>
                    <x-admin.table-data title="{{ $user->email }}"/>
                    <x-admin.table-data title="{{ $user->phone }}"/>
                    <x-admin.table-data title="{{ $user->role ? 'Administrateur' : 'Bénévole' }}"/>
                    <td class="border py-2 bg-white space-x-2">
                        <button
                            wire:click="openEditModal({{ $user->id }})"
                            class="bg-background-green text-white py-1 px-3 rounded-button">
                            Modifier
                        </button>

                        <button
                            wire:click="deleteUser({{ $user->id }})"
                            wire:confirm="Êtes-vous sûr de vouloir supprimer {{ ucfirst($user->name) }} ?"
                            class="bg-red-600 hover:bg-red-700 text-white py-1 px-3 rounded-button">
                            Supprimer
                        </button>
                    </td>
                </tr>
            @endforeach
        </x-admin.table>
        <x-admin.headings2 title="Horaire des bénévoles"/>
        <x-admin.table>
            <tr>
                <x-admin.table-header title="Nom" />
                <x-admin.table-header title="Lundi" />
                <x-admin.table-header title="Mardi" />
                <x-admin.table-header title="Mercredi" />
                <x-admin.table-header title="Jeudi" />
                <x-admin.table-header title="Vendredi" />
                <x-admin.table-header title="Samedi" />
                <x-admin.table-header title="Actions" />
            </tr>
            <tr>
                <x-admin.table-data title="Martin" />
                <x-admin.table-data title="9h-12h" />
                <x-admin.table-data title="9h-12h" />
                <x-admin.table-data title="9h-12h" />
                <x-admin.table-data title="9h-12h" />
                <x-admin.table-data title="9h-12h" />
                <x-admin.table-data title="9h-12h" />
                <x-admin.table-data title="Modifier" />
            </tr>
        </x-admin.table>
    </x-admin.section-spacing>

    <div class="{{ $showCreateUserModal ? 'block' : 'hidden' }}">
        <x-modal.modal>
            <x-slot:title>
                Ajouter un bénévole
                <button type="button" wire:click="toggleModal('createUser', 'close')">
                    <img src="{{ asset('svg/close.svg') }}" alt="close" height="30" width="30">
                </button>
            </x-slot:title>
            <x-slot:body>
                <form wire:submit.prevent="createUserInList" class="space-y-4">
                    <x-form.input placeholder="Jean" name="name" title="Nom" type="text" wire:model.defer="name"/>
                    <x-form.input placeholder="jean@mail.be" name="email" title="Email" type="email" wire:model.defer="email"/>
                    <x-form.input placeholder="0471420854" name="phone" title="Téléphone" type="text" wire:model.defer="phone"/>
                    <x-form.input placeholder="********" name="password" title="Mot de passe" type="text" wire:model.defer="password"/>

                    <div class="flex items-center space-x-2">
                        <input type="checkbox" id="role" wire:model.defer="role" class="form-checkbox h-5 w-5 text-background-green">
                        <label for="role" class="text-gray-700">Administrateur</label>
                    </div>

                    <button type="submit" class="bg-cta-orange hover:bg-cta-hover text-white py-2 px-4 rounded-button">
                        Ajouter
                    </button>
                </form>
            </x-slot:body>
        </x-modal.modal>
    </div>

    <div class="{{ $showEditUserModal ? 'block' : 'hidden' }}">
        <x-modal.modal>
            <x-slot:title>
                Modifier un bénévole
                <button type="button" wire:click="toggleModal('openEditModal', 'close')">
                    <img src="{{ asset('svg/close.svg') }}" alt="close" height="30" width="30">
                </button>
            </x-slot:title>
            <x-slot:body>
                <form wire:submit.prevent="editUser" class="space-y-4">
                    <x-form.input placeholder="Jean" name="name" title="Nom" type="text" wire:model.defer="name"/>
                    <x-form.input placeholder="jean@mail.be" name="email" title="Email" type="email" wire:model.defer="email"/>
                    <x-form.input placeholder="0471420854" name="phone" title="Téléphone" type="text" wire:model.defer="phone"/>

                    <div class="flex items-center space-x-2">
                        <input type="checkbox" id="role" wire:model.defer="role" class="form-checkbox h-5 w-5 text-background-green">
                        <label for="role" class="text-gray-700">Administrateur</label>
                    </div>

                    <button type="submit" class="bg-cta-orange hover:bg-cta-hover text-white py-2 px-4 rounded-button">
                        Enregistrer
                    </button>
                </form>
            </x-slot:body>
        </x-modal.modal>
    </div>

</main>
