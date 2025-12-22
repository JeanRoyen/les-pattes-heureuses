<form class="space-y-6" wire:submit.prevent="editAnimal">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
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
                class="border-input-grey border-1 rounded-button pl-2 w-full py-1 focus:border-background-green focus:outline-none">
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
                class="border-input-grey border-1 rounded-button pl-2 w-full py-1 focus:border-background-green focus:outline-none">
                <option value="">Choisir un statut</option>
                <option value="waiting">En attente</option>
                <option value="available">Disponible</option>
                <option value="in_care">En soins</option>
                <option value="adopted">Adopté</option>
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
        <x-form.button title="Modifier l'animal"/>
    </div>
</form>
