<main class="flex-1 ml-64 space-y-10">
    <x-admin.section-spacing>
        <x-admin.headings2 title="Animaux au refuge"/>
        <x-general.searchbar/>
        <div class="grid grid-cols-8 gap-5">
            <x-general.select name="species" title="Espèces">
                <option selected>Choisir une espèce</option>
                <option value="1">Chien</option>
                <option value="2">Chat</option>
            </x-general.select>
            <x-general.select name="races" title="Races">
                <option selected>Choisir une race</option>
                <option value="1">Berger Allemand</option>
                <option value="2">Berger Malinois</option>
            </x-general.select>
            <x-general.select name="sex" title="Sexe">
                <option selected>Choisir un sexe</option>
                <option value="1">Homme</option>
                <option value="2">Femme</option>
            </x-general.select>
            <x-general.select name="age" title="Âge">
                <option selected>Choisir un âge</option>
                <option value="1">2-4 ans</option>
                <option value="2">5-7 ans</option>
            </x-general.select>
        </div>
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
                    <x-admin.table-data title="Supprimer / Voir"/>
                </tr>
            @empty
                <tr>
                    <td colspan="9" class="text-center py-4 bg-white border">Pas d'animaux trouvés</td>
                </tr>
            @endforelse
        </x-admin.table>
        {{-- TODO: Paginate --}}
        <x-admin.cta/>
    </x-admin.section-spacing>
    <x-admin.section-spacing>
        <x-admin.headings2 title="Animaux en attente de validation"/>
        <x-general.searchbar/>
        <div class="grid grid-cols-8 gap-5">
            <x-general.select name="species" title="Espèces">
                <option selected>Choisir une espèce</option>
                <option value="1">Chien</option>
                <option value="2">Chat</option>
            </x-general.select>
            <x-general.select name="races" title="Races">
                <option selected>Choisir une race</option>
                <option value="1">Berger Allemand</option>
                <option value="2">Berger Malinois</option>
            </x-general.select>
            <x-general.select name="sex" title="Sexe">
                <option selected>Choisir un sexe</option>
                <option value="1">Homme</option>
                <option value="2">Femme</option>
            </x-general.select>
            <x-general.select name="age" title="Âge">
                <option selected>Choisir un âge</option>
                <option value="1">2-4 ans</option>
                <option value="2">5-7 ans</option>
            </x-general.select>
        </div>
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
                    <x-admin.table-data title="Supprimer / Voir"/>
                </tr>
            @empty
                <tr>
                    <td colspan="9" class="text-center py-4 bg-white border">Pas d'animaux trouvés</td>
                </tr>
            @endforelse
        </x-admin.table>
    </x-admin.section-spacing>
    <x-admin.section-spacing>
        <x-admin.headings2 title="Animaux adoptés"/>
        <x-general.searchbar/>
        <div class="grid grid-cols-8 gap-5">
            <x-general.select name="species" title="Espèces">
                <option selected>Choisir une espèce</option>
                <option value="1">Chien</option>
                <option value="2">Chat</option>
            </x-general.select>
            <x-general.select name="races" title="Races">
                <option selected>Choisir une race</option>
                <option value="1">Berger Allemand</option>
                <option value="2">Berger Malinois</option>
            </x-general.select>
            <x-general.select name="sex" title="Sexe">
                <option selected>Choisir un sexe</option>
                <option value="1">Homme</option>
                <option value="2">Femme</option>
            </x-general.select>
            <x-general.select name="age" title="Âge">
                <option selected>Choisir un âge</option>
                <option value="1">2-4 ans</option>
                <option value="2">5-7 ans</option>
            </x-general.select>
        </div>
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
                    <x-admin.table-data title="Supprimer / Voir"/>
                </tr>
            @empty
                <tr>
                    <td colspan="9" class="text-center py-4 bg-white border">Pas d'animaux trouvés</td>
                </tr>
            @endforelse
        </x-admin.table>
        {{-- TODO: Paginate --}}
    </x-admin.section-spacing>
</main>
