
<main class="flex-1 ml-64 space-y-10">
    <x-admin.section-spacing>
        <x-admin.headings2 title="Demandes et messages"/>
        <x-admin.square-infos-container>
            <a wire:navigate href="{{ route('admin.messages') }}">
                <x-general.square-infos number="1" title="Demandes" svg="contact"/>
            </a>
            <a wire:navigate href="{{ route('admin.messages') }}">
                <x-general.square-infos number="3" title="Messages" svg="mail"/>
            </a>
        </x-admin.square-infos-container>
    </x-admin.section-spacing>
    <x-admin.section-spacing>
        <x-admin.headings2 title="Résumé mensuel"/>
        <x-admin.square-infos-container>
            <x-general.square-infos number="23" title="Chiens au refuge" svg="dog"/>
            <x-general.square-infos number="33" title="Chats au refuge" svg="cat"/>
            <x-general.square-infos number="56" title="Sont au refuge" svg="shelter"/>
            <x-general.square-infos number="5" title="Ont quitté" svg="circled-minus"/>
            <x-general.square-infos number="9" title="Sont arrivé refuge" svg="circled-plus"/>
        </x-admin.square-infos-container>
        <div class="mt-8">
            <div>
                <a href="{{ route('pdf') }}" class="p-3 bg-cta-orange text-white rounded-button hover: cursor-pointer">
                    Exporter en PDF
                </a>
            </div>

        </div>
    </x-admin.section-spacing>
    <x-admin.section-spacing>
        <x-admin.headings2 title="Horaire des bénévoles"/>
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
