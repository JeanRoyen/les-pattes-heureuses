<?php

use App\Jobs\ProcessAvatar;
use App\Models\Animal;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;

new class extends Component {
    use WithFileUploads;

    #[Validate('nullable|max:10240')]
    public $avatar = null;

    #[Validate('required')]
    public string $name;

    #[Validate('required')]
    public string $specie;

    #[Validate('required')]
    public string $race;

    #[Validate('required|date|before_or_equal:today')]
    public $age;

    #[Validate('required')]
    public bool $gender;

    #[Validate('boolean')]
    public bool $vaccine;

    #[Validate('string|nullable')]
    public string $description = '';

    #[Validate('string')]
    public string $status;

    public function createAnimal(): void
    {
        $validated = $this->validate();

        if ($this->avatar) {
            $image_type = 'jpeg';
            $original_path = 'avatar/original';
            $file_name = 'avatar_img_' . uniqid() . '.' . $image_type;
            $avatar_path = $this->avatar->storeAs($original_path, $file_name, 'public');
            ProcessAvatar::dispatch($file_name, $avatar_path);
            $validated['avatar'] = $avatar_path;
        }


        Animal::create($validated);


        $this->dispatch('animal-created');
        $this->reset([
            'avatar',
            'name',
            'status',
            'specie',
            'race',
            'age',
            'gender',
            'vaccine',
            'description',
        ]);
    }
};
?>

<form class="space-y-6" wire:submit="createAnimal">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        @if ($avatar)
            <img alt="Votre avatar" src="{{ $avatar->temporaryUrl() }}">
        @endif

        <input type="file" wire:model="avatar">

        @error('avatar') <span class="error">{{ $message }}</span> @enderror

        <x-form.input
            name="name"
            title="Nom"
            wire:model="name"
            type="text"
            placeholder="Bob"
        />
        <div>
            <label for="specie" class="block">Espèce</label>
            <select
                id="specie"
                name="specie"
                wire:model="specie"
                class="border-input-grey border rounded-button pl-2 w-full py-1 focus:border-background-green focus:outline-none">
                <option value="">Choisir une espèce</option>
                <option value="dog">Chien</option>
                <option value="cat">Chat</option>
                <option value="ferret">Furet</option>
            </select>
        </div>
        <x-form.input
            name="race"
            title="Race"
            type="text"
            wire:model="race"
            placeholder="Berger Allemand"
        />
        <div>
            <label for="status" class="block">Statut</label>
            <select
                id="status"
                name="status"
                wire:model="status"
                class="border-input-grey border rounded-button pl-2 w-full py-1 focus:border-background-green focus:outline-none disabled:bg-gray-200">
                <option value="">Choisir un statut</option>
                <option value="available">Disponible</option>
                <option value="in_care">En soins</option>
            </select>
        </div>
        <x-form.input
            name="age"
            title="Date de naissance"
            type="date"
            wire:model="age"
            placeholder=""
        />
        <div>
            <fieldset>
                <legend>Sexe de l'animal</legend>
                <div>
                    <input type="radio" id="male" name="gender" wire:model="gender" value="1"/>
                    <label for="male">Mâle</label>
                </div>

                <div>
                    <input type="radio" id="female" name="gender" wire:model="gender" value="0"/>
                    <label for="female">Femelle</label>
                </div>
            </fieldset>
        </div>
        <div class="flex items-center gap-2 md:col-span-2">
            <input
                type="checkbox"
                id="vaccinated"
                name="vaccine"
                wire:model="vaccine"
                class="rounded"
            >
            <label for="vaccinated">Vacciné</label>
        </div>
    </div>
    <x-form.textarea
        name="description"
        wire:model="description"
        placeholder="Description de l'animal"
    />
    <div class="pt-4">
        <x-form.button title="Ajouter l'animal"/>
    </div>
</form>
