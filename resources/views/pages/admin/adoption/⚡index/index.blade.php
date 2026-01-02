<main class="flex-1 ml-64 space-y-10">
    <x-admin.section-spacing>
        <x-admin.headings2 title="Demandes en attente"/>
{{--
        <x-general.searchbar/>
--}}
        <x-admin.table>
            <tr>
                <x-admin.table-header title="Nom"/>
                <x-admin.table-header title="Nom de l'animal"/>
                <x-admin.table-header title="Email"/>
                <x-admin.table-header title="Téléphone"/>
                <x-admin.table-header title="Message"/>
                <x-admin.table-header title="Status"/>
                <x-admin.table-header title="Action"/>
            </tr>
            <tr>
                <x-admin.table-data title="Sarah"/>
                <x-admin.table-data title="Bob"/>
                <x-admin.table-data title="Sarah@mal.be "/>
                <x-admin.table-data title="04 71 42 08 54"/>
                <x-admin.table-data title="J’aimerai adopté Bob, j’ai un grand jardin ainsi qu’une bonne condi..."/>
                <x-admin.table-data title="En attente"/>
                <x-admin.table-data title="Supprimer / Voir"/>
            </tr>
            <tr>
                <x-admin.table-data title="Sarah"/>
                <x-admin.table-data title="Bob"/>
                <x-admin.table-data title="Sarah@mal.be "/>
                <x-admin.table-data title="04 71 42 08 54"/>
                <x-admin.table-data title="J’aimerai adopté Bob, j’ai un grand jardin ainsi qu’une bonne condi..."/>
                <x-admin.table-data title="En attente"/>
                <x-admin.table-data title="Supprimer / Voir"/>
            </tr>
            <tr>
                <x-admin.table-data title="Sarah"/>
                <x-admin.table-data title="Bob"/>
                <x-admin.table-data title="Sarah@mal.be "/>
                <x-admin.table-data title="04 71 42 08 54"/>
                <x-admin.table-data title="J’aimerai adopté Bob, j’ai un grand jardin ainsi qu’une bonne condi..."/>
                <x-admin.table-data title="En attente"/>
                <x-admin.table-data title="Supprimer / Voir"/>
            </tr>
        </x-admin.table>
        {{-- TODO: Paginate --}}
    </x-admin.section-spacing>
    <x-admin.section-spacing>
        <x-admin.headings2 title="Demande traitées"/>
{{--
        <x-general.searchbar/>
--}}
        <x-admin.table>
            <tr>
                <x-admin.table-header title="Nom"/>
                <x-admin.table-header title="Nom de l'animal"/>
                <x-admin.table-header title="Email"/>
                <x-admin.table-header title="Téléphone"/>
                <x-admin.table-header title="Message"/>
                <x-admin.table-header title="Status"/>
                <x-admin.table-header title="Action"/>
            </tr>
            <tr>
                <x-admin.table-data title="Sarah"/>
                <x-admin.table-data title="Bob"/>
                <x-admin.table-data title="Sarah@mal.be "/>
                <x-admin.table-data title="04 71 42 08 54"/>
                <x-admin.table-data title="J’aimerai adopté Bob, j’ai un grand jardin ainsi qu’une bonne condi..."/>
                <x-admin.table-data title="Accepté"/>
                <x-admin.table-data title="Supprimer / Voir"/>
            </tr>
            <tr>
                <x-admin.table-data title="Sarah"/>
                <x-admin.table-data title="Bob"/>
                <x-admin.table-data title="Sarah@mal.be "/>
                <x-admin.table-data title="04 71 42 08 54"/>
                <x-admin.table-data title="J’aimerai adopté Bob, j’ai un grand jardin ainsi qu’une bonne condi..."/>
                <x-admin.table-data title="Refusé"/>
                <x-admin.table-data title="Supprimer / Voir"/>
            </tr>
        </x-admin.table>
    </x-admin.section-spacing>
</main>
