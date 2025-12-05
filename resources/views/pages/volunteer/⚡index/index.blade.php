<main class="flex-1 ml-64 space-y-10">
    <x-admin.section-spacing>
        <x-admin.headings2 title="Animaux au refuge"/>
        <x-general.searchbar/>
        <x-admin.table>
            <tr>
                <x-admin.table-header title="Nom"/>
                <x-admin.table-header title="Email"/>
                <x-admin.table-header title="Téléphone"/>
                <x-admin.table-header title="Actions"/>
            </tr>
            <tr>
                <x-admin.table-data title="Chloé"/>
                <x-admin.table-data title="chloe@benevole.be"/>
                <x-admin.table-data title="04 71 42 08 54"/>
                <x-admin.table-data title="Supprimer / Voir"/>
            </tr>
            <tr>
                <x-admin.table-data title="Chloé"/>
                <x-admin.table-data title="chloe@benevole.be"/>
                <x-admin.table-data title="04 71 42 08 54"/>
                <x-admin.table-data title="Supprimer / Voir"/>
            </tr>
            <tr>
                <x-admin.table-data title="Chloé"/>
                <x-admin.table-data title="chloe@benevole.be"/>
                <x-admin.table-data title="04 71 42 08 54"/>
                <x-admin.table-data title="Supprimer / Voir"/>
            </tr>
        </x-admin.table>
        {{-- TODO: Paginate --}}
        <x-admin.cta title="Ajouter un bénévole"/>
    </x-admin.section-spacing>
    <x-admin.section-spacing>
        <x-admin.headings2 title="Horaire des bénévoles"/>
        <x-general.searchbar/>
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
                <x-admin.table-data title="Chloé" />
                <x-admin.table-data title="9h-12h" />
                <x-admin.table-data title="9h-12h" />
                <x-admin.table-data title="9h-12h" />
                <x-admin.table-data title="9h-12h" />
                <x-admin.table-data title="9h-12h" />
                <x-admin.table-data title="9h-12h" />
                <x-admin.table-data title="Modifier" />
            </tr>
            <tr>
                <x-admin.table-data title="Chloé" />
                <x-admin.table-data title="9h-12h" />
                <x-admin.table-data title="9h-12h" />
                <x-admin.table-data title="9h-12h" />
                <x-admin.table-data title="9h-12h" />
                <x-admin.table-data title="9h-12h" />
                <x-admin.table-data title="9h-12h" />
                <x-admin.table-data title="Modifier" />
            </tr>
            <tr>
                <x-admin.table-data title="Chloé" />
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
</main>
