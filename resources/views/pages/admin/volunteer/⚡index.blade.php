<?php

use App\Models\User;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Title;
use Livewire\Component;

new #[Title('Bénévoles | Les Pattes Heureuses')]
class extends Component {
    public string $name = '';
    public string $phone = '';
    public string $email = '';
    public string $password = '';
    public bool $isAdmin = false;
    public ?int $userId = null;
    public bool $showCreateUserModal = false;
    public bool $showEditUserModal = false;
    public string $volunteerSearch = '';

    #[Computed]
    public function users()
    {
        return User::query()
            ->when(
                $this->volunteerSearch !== '',
                fn($q) => $q->where('name', 'like', "%{$this->volunteerSearch}%")
            )
            ->get();
    }

    public function createUser(): void
    {
        $this->showCreateUserModal = true;
    }

    public function toggleModal($modalType, $action): void
    {
        if ($modalType === 'createUser') {
            $this->showCreateUserModal = $action === 'open';
            $action === 'open' ? $this->dispatch('open-modal') : $this->dispatch('close-modal');
        } elseif ($modalType === 'openEditModal') {
            $this->showEditUserModal = $action === 'open';
            $action === 'open' ? $this->dispatch('open-modal') : $this->dispatch('close-modal');
        }
    }

    public function createUserInList(): void
    {
        $this->validate([
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'password' => 'required',
            'isAdmin' => 'required|boolean',
        ]);

        $user = User::create([
            'name' => $this->name,
            'phone' => $this->phone,
            'email' => $this->email,
            'password' => $this->password,
            'isAdmin' => $this->isAdmin,
        ]);

        $this->showCreateUserModal = false;

        $this->reset([
            'name',
            'phone',
            'email',
            'password',
            'isAdmin',
        ]);
    }

    public function openEditModal($userId): void
    {
        $user = User::findOrFail($userId);
        $this->userId = $user->id;
        $this->name = $user->name;
        $this->phone = $user->phone;
        $this->email = $user->email;
        $this->password = $user->password;
        $this->isAdmin = $user->isAdmin;

        $this->toggleModal('openEditModal', 'open');
    }

    public function editUser(): void
    {
        $validated = $this->validate([
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'password' => 'required',
            'isAdmin' => 'required|boolean',
        ]);

        $user = User::findOrFail($this->userId);

        $user->update([
            'name' => $this->name,
            'phone' => $this->phone,
            'email' => $this->email,
            'password' => bcrypt($this->password),
            'isAdmin' => $this->isAdmin,
        ]);

        $this->showEditUserModal = false;

        $this->reset([
            'userId',
            'name',
            'phone',
            'email',
            'password',
            'isAdmin',
        ]);
    }

    public function deleteUser(int $userId): void
    {
        if (auth()->user()->role !== 1) {
            return;
        }
        $user = User::findOrFail($userId);

        $user->delete();
    }
};
?>

<main class="flex-1 ml-64 space-y-10">
    <x-admin.section-spacing>
        <x-admin.headings2 title="Bénévoles du refuge"/>
        <x-admin.cta function="createUser" title="Ajouter un bénévole"/>
        <x-table>
            <tr>
                <x-table.table-header title="Nom"/>
                <x-table.table-header title="Email"/>
                <x-table.table-header title="Téléphone"/>
                <x-table.table-header title="Rôle"/>
                <x-table.table-header title="Actions"/>
            </tr>
            <x-general.searchbar model="volunteerSearch"/>
            @foreach($this->users as $user)
                <tr>
                    <x-table.table-data title="{{ ucfirst($user->name) }}"/>
                    <x-table.table-data title="{{ $user->email }}"/>
                    <x-table.table-data title="{{ $user->phone }}"/>
                    <x-table.table-data title="{{ $user->isAdmin ? 'Administrateur' : 'Bénévole' }}"/>
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
        </x-table>
        <x-admin.headings2 title="Horaire des bénévoles"/>
        <x-table>
            <tr>
                <x-table.table-header title="Nom"/>
                <x-table.table-header title="Lundi"/>
                <x-table.table-header title="Mardi"/>
                <x-table.table-header title="Mercredi"/>
                <x-table.table-header title="Jeudi"/>
                <x-table.table-header title="Vendredi"/>
                <x-table.table-header title="Samedi"/>
                <x-table.table-header title="Actions"/>
            </tr>
            <tr>
                <x-table.table-data title="Martin"/>
                <x-table.table-data title="9h-12h"/>
                <x-table.table-data title="9h-12h"/>
                <x-table.table-data title="9h-12h"/>
                <x-table.table-data title="9h-12h"/>
                <x-table.table-data title="9h-12h"/>
                <x-table.table-data title="9h-12h"/>
                <x-table.table-data title="Modifier"/>
            </tr>
        </x-table>
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
                    <x-form.input placeholder="jean@mail.be" name="email" title="Email" type="email"
                                  wire:model.defer="email"/>
                    <x-form.input placeholder="0471420854" name="phone" title="Téléphone" type="text"
                                  wire:model.defer="phone"/>
                    <x-form.input placeholder="********" name="password" title="Mot de passe" type="text"
                                  wire:model.defer="password"/>

                    <div class="flex items-center space-x-2">
                        <input type="checkbox" id="isAdmin" wire:model.defer="isAdmin"
                               class="form-checkbox h-5 w-5 text-background-green">
                        <label for="isAdmin" class="text-gray-700">Administrateur</label>
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
                    <x-form.input placeholder="jean@mail.be" name="email" title="Email" type="email"
                                  wire:model.defer="email"/>
                    <x-form.input placeholder="0471420854" name="phone" title="Téléphone" type="text"
                                  wire:model.defer="phone"/>

                    <div class="flex items-center space-x-2">
                        <input type="checkbox" id="isAdmin" wire:model.defer="isAdmin"
                               class="form-checkbox h-5 w-5 text-background-green">
                        <label for="isAdmin" class="text-gray-700">Administrateur</label>
                    </div>

                    <button type="submit" class="bg-cta-orange hover:bg-cta-hover text-white py-2 px-4 rounded-button">
                        Enregistrer
                    </button>
                </form>
            </x-slot:body>
        </x-modal.modal>
    </div>

</main>
