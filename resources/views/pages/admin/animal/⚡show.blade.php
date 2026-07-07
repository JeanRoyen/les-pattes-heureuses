<?php

use App\Jobs\ProcessAvatar;
use App\Livewire\Forms\AnimalForm;
use App\Models\Animal;
use App\Models\Breed;
use App\Models\Specie;
use Illuminate\Support\Collection;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Title;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;


new #[Title('Animaux | Les Pattes Heureuses')]
class extends Component {
    use WithFileUploads;

    public Animal $animal;

    public $avatar;

    public AnimalForm $form;

    public function mount(Animal $animal)
    {
        $this->form->setAnimal($animal);
    }

    #[Computed]
    public function species(): Collection
    {
        return Specie::all();
    }

    #[Computed]
    public function breeds(): Collection
    {
        return Breed::all();
    }

    public function updateAnimal()
    {
        $this->form->update();

        return $this->redirect(route('admin.animals'));
    }
};
?>
<main class="flex-1 ml-64 space-y-10">
    <x-slot:page_title>
        Modification de {{ $animal->name }}
    </x-slot:page_title>

    <form wire:submit="updateAnimal">
        <div class="mx-auto max-w-4xl px-4 py-10">

            <div class="mx-auto w-full">

                <div class="overflow-hidden rounded-2xl border border-gray-200 bg-white">

                    <div class="p-8">

                        <div class="space-y-5">

                            <div class="space-y-4">

                                <label class="block">
                                    Avatar
                                </label>

                                <div class="flex items-center gap-6">

                                    @if($form->avatar)
                                        <img
                                            src="{{ $form->avatar->temporaryUrl() }}"
                                            class="h-64 w-64 rounded-xl border border-gray-200 object-cover bg-white"
                                            alt="{{ $animal->name }}"
                                        >
                                    @elseif($animal->avatar)
                                        <img
                                            src="{{ Storage::url($animal->avatar) }}"
                                            class="h-64 w-64 rounded-xl border border-gray-200 object-cover bg-white"
                                            alt="{{ $animal->name }}"
                                        >
                                    @else
                                        <div
                                            class="flex h-64 w-64 items-center justify-center rounded-xl border border-gray-200 bg-gray-100 text-sm text-gray-500">
                                            Pas d'image
                                        </div>
                                    @endif


                                    <div class="space-y-2">

                                        <label
                                            class="inline-flex cursor-pointer items-center rounded-lg bg-orange-400 px-4 py-2 text-sm font-medium text-white transition hover:bg-orange-500"
                                        >
                                            Modifier la photo

                                            <input
                                                type="file"
                                                wire:model="form.avatar"
                                                accept="image/*"
                                                class="hidden"
                                            >
                                        </label>
                                        <p class="text-xs text-gray-500">
                                            PNG, JPG ou WEBP.
                                        </p>
                                    </div>

                                </div>


                                @error('avatar')
                                <span class="text-sm text-red-500">{{ $message }}</span>
                                @enderror
                            </div>

                            <x-form.input
                                name="form.name"
                                title="Nom"
                                type="text"
                                wire:model="form.name"
                                placeholder="Nom de l'animal"
                            />

                            <div>
                                <label class="mb-2 block text-sm font-medium text-gray-700">
                                    Statut
                                </label>

                                <select
                                    wire:model="form.status"
                                    class="w-full rounded-lg border border-gray-300 px-4 py-3"
                                >
                                    <option value="waiting">En attente</option>
                                    <option value="available">Disponible</option>
                                    <option value="in_care">En soins</option>
                                    <option value="adopted">Adopté</option>
                                </select>
                            </div>
                            @error('form.status')
                            <span class="text-sm text-red-500">{{ $message }}</span>
                            @enderror

                            <div class="grid grid-cols-1 gap-4 sm:grid-cols-3">

                                <div>
                                    <label class="mb-2 block text-sm font-medium text-gray-700">
                                        Espèce
                                    </label>

                                    <select
                                        wire:model.live="form.specie_id"
                                        class="w-full rounded-lg border border-gray-300 px-4 py-3"
                                    >
                                        @foreach($this->species as $specie)
                                            <option value="{{ $specie->id }}">
                                                {{ $specie->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('form.specie_id')
                                    <span class="text-sm text-red-500">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div>
                                    <label class="mb-2 block text-sm font-medium text-gray-700">
                                        Race
                                    </label>

                                    <select
                                        wire:model="form.breed_id"
                                        class="w-full rounded-lg border border-gray-300 px-4 py-3"
                                    >
                                        @foreach($this->breeds as $breed)
                                            <option value="{{ $breed->id }}">
                                                {{ $breed->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('form.breed_id')
                                    <span class="text-sm text-red-500">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div>
                                    <label class="mb-2 block text-sm font-medium text-gray-700">
                                        Date de naissance
                                    </label>

                                    <input
                                        type="date"
                                        wire:model="form.age"
                                        class="w-full rounded-lg border border-gray-300 px-4 py-3"
                                    >
                                    @error('form.age')
                                    <span class="text-sm text-red-500">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div>
                                <label class="mb-3 block text-sm font-medium text-gray-700">
                                    Sexe
                                </label>

                                <div class="flex gap-6">
                                    <label class="flex items-center gap-2">
                                        <input
                                            type="radio"
                                            wire:model="form.gender"
                                            value="1"
                                        >
                                        <span>Mâle</span>
                                    </label>

                                    <label class="flex items-center gap-2">
                                        <input
                                            type="radio"
                                            wire:model="form.gender"
                                            value="0"
                                        >
                                        <span>Femelle</span>
                                    </label>
                                    @error('form.status')
                                    <span class="text-sm text-red-500">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div>
                                <label class="flex items-center gap-3">
                                    <input
                                        type="checkbox"
                                        wire:model="form.vaccine"
                                        class="rounded"
                                    >

                                    <span>Vaccins à jour</span>
                                </label>
                            </div>

                            <div class="border-t border-gray-100 pt-5">
                                <label class="mb-2 block text-sm font-medium text-gray-700">
                                    Description
                                </label>

                                <textarea
                                    wire:model="form.description"
                                    rows="6"
                                    class="w-full rounded-lg border border-gray-300 px-4 py-3"
                                ></textarea>
                            </div>

                        </div>
                    </div>

                    <div class="border-t border-gray-100 bg-gray-50 p-8">
                        <button
                            type="submit"
                            class="flex w-full items-center justify-center gap-2 rounded-lg bg-orange-400 px-4 py-3 font-medium text-white transition-colors hover:bg-orange-500"
                        >
                            Enregistrer les modifications
                        </button>
                    </div>

                </div>
            </div>
        </div>
    </form>
</main>
