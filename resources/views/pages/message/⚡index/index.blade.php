
<main class="flex-1 ml-64 space-y-10">
    <x-admin.section-spacing>
        <x-admin.headings2 title="Messages en attente"/>
        <x-general.searchbar/>
        <x-admin.table>
            <tr>
                <x-admin.table-header title="Nom"/>
                <x-admin.table-header title="Email"/>
                <x-admin.table-header title="Téléphone"/>
                <x-admin.table-header title="Actions"/>
            </tr>
            <tr>
                <x-admin.table-data title="Sarah"/>
                <x-admin.table-data title="Sarah@adopte.be"/>
                <x-admin.table-data title="04 02 12 12 42"/>
                <x-admin.table-data title="Voir la discussion"/>
            </tr>
        </x-admin.table>
        {{-- TODO: Paginate --}}
    </x-admin.section-spacing>
    <x-admin.section-spacing>
        <x-admin.headings2 title="Messages traités"/>
        <x-general.searchbar/>
        <x-admin.table>
            <tr>
                <x-admin.table-header title="Nom"/>
                <x-admin.table-header title="Email"/>
                <x-admin.table-header title="Téléphone"/>
                <x-admin.table-header title="Actions"/>
            </tr>
            <tr>
                <x-admin.table-data title="Sarah"/>
                <x-admin.table-data title="Sarah@adopte.be"/>
                <x-admin.table-data title="04 02 12 12 42"/>
                <x-admin.table-data title="Voir la discussion"/>
            </tr>
            <tr>
                <x-admin.table-data title="Sarah"/>
                <x-admin.table-data title="Sarah@adopte.be"/>
                <x-admin.table-data title="04 02 12 12 42"/>
                <x-admin.table-data title="Voir la discussion"/>
            </tr>
        </x-admin.table>
    </x-admin.section-spacing>
</main>
