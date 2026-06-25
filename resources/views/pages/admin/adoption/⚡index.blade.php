<?php

use Livewire\Attributes\Title;
use Livewire\Component;

new #[Title('Adoptions | Les Pattes Heureuses')]
class extends Component {
    //
};
?>

<main class="flex-1 ml-64 space-y-10">
    <x-admin.section-spacing>
        <x-admin.headings2 title="Demandes en attente"/>
        {{--
                <x-general.searchbar/>
        --}}
        <x-table>
            <tr>
                <x-table.table-header title="Nom"/>
                <x-table.table-header title="Nom de l'animal"/>
                <x-table.table-header title="Email"/>
                <x-table.table-header title="Téléphone"/>
                <x-table.table-header title="Message"/>
                <x-table.table-header title="Status"/>
                <x-table.table-header title="Action"/>
            </tr>
            <tr>
                <x-table.table-data title="Sarah"/>
                <x-table.table-data title="Bob"/>
                <x-table.table-data title="Sarah@mal.be "/>
                <x-table.table-data title="04 71 42 08 54"/>
                <x-table.table-data title="J’aimerai adopté Bob, j’ai un grand jardin ainsi qu’une bonne condi..."/>
                <x-table.table-data title="En attente"/>
                <x-table.table-data title="Supprimer / Voir"/>
            </tr>
            <tr>
                <x-table.table-data title="Sarah"/>
                <x-table.table-data title="Bob"/>
                <x-table.table-data title="Sarah@mal.be "/>
                <x-table.table-data title="04 71 42 08 54"/>
                <x-table.table-data title="J’aimerai adopté Bob, j’ai un grand jardin ainsi qu’une bonne condi..."/>
                <x-table.table-data title="En attente"/>
                <x-table.table-data title="Supprimer / Voir"/>
            </tr>
            <tr>
                <x-table.table-data title="Sarah"/>
                <x-table.table-data title="Bob"/>
                <x-table.table-data title="Sarah@mal.be "/>
                <x-table.table-data title="04 71 42 08 54"/>
                <x-table.table-data title="J’aimerai adopté Bob, j’ai un grand jardin ainsi qu’une bonne condi..."/>
                <x-table.table-data title="En attente"/>
                <x-table.table-data title="Supprimer / Voir"/>
            </tr>
        </x-table>
        {{-- TODO: Paginate --}}
    </x-admin.section-spacing>
    <x-admin.section-spacing>
        <x-admin.headings2 title="Demande traitées"/>
        {{--
                <x-general.searchbar/>
        --}}
        <x-table>
            <tr>
                <x-table.table-header title="Nom"/>
                <x-table.table-header title="Nom de l'animal"/>
                <x-table.table-header title="Email"/>
                <x-table.table-header title="Téléphone"/>
                <x-table.table-header title="Message"/>
                <x-table.table-header title="Status"/>
                <x-table.table-header title="Action"/>
            </tr>
            <tr>
                <x-table.table-data title="Sarah"/>
                <x-table.table-data title="Bob"/>
                <x-table.table-data title="Sarah@mal.be "/>
                <x-table.table-data title="04 71 42 08 54"/>
                <x-table.table-data title="J’aimerai adopté Bob, j’ai un grand jardin ainsi qu’une bonne condi..."/>
                <x-table.table-data title="Accepté"/>
                <x-table.table-data title="Supprimer / Voir"/>
            </tr>
            <tr>
                <x-table.table-data title="Sarah"/>
                <x-table.table-data title="Bob"/>
                <x-table.table-data title="Sarah@mal.be "/>
                <x-table.table-data title="04 71 42 08 54"/>
                <x-table.table-data title="J’aimerai adopté Bob, j’ai un grand jardin ainsi qu’une bonne condi..."/>
                <x-table.table-data title="Refusé"/>
                <x-table.table-data title="Supprimer / Voir"/>
            </tr>
        </x-table>
    </x-admin.section-spacing>
</main>
