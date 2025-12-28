<?php

use App\Models\User;
use Livewire\Component;
use Livewire\Attributes\Computed;
use Illuminate\Database\Eloquent\Collection;

new class extends Component {

    public string $name = '';
    public string $phone = '';
    public string $email = '';
    public string $password = '';
    public bool $role = false;
    public ?int $userId = null;
    public bool $showCreateUserModal = false;
    public bool $showEditUserModal = false;
    public string $volunteerSearch = '';

    #[Computed]
    public function users(): Collection
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
            'role' => 'required|boolean',
        ]);

        $user = User::create([
            'name' => $this->name,
            'phone' => $this->phone,
            'email' => $this->email,
            'password' => $this->password,
            'role' => $this->role,
        ]);

        $this->showCreateUserModal = false;

        $this->reset([
            'name',
            'phone',
            'email',
            'password',
            'role',
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
        $this->role = $user->role;

        $this->toggleModal('openEditModal', 'open');
    }

    public function editUser(): void
    {
        $validated = $this->validate([
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'password' => 'required',
            'role' => 'required|boolean',
        ]);

        $user = User::findOrFail($this->userId);

        $this->showEditUserModal = false;
        $this->reset([
            'name',
            'phone',
            'email',
            'password',
            'role',
        ]);
    }

    public function deleteUser(int $userId)
    {
        if (auth()->user()->role !== 1) {
            return;
        }
        $user = User::findOrFail($userId);

        $user->delete();
    }
};
