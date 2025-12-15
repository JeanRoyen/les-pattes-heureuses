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
            @forelse($this->availableMessages as $message)
                <tr>
                    <x-admin.table-data title="{{ $message->name }}"/>
                    <x-admin.table-data title="{{ $message->email }}"/>
                    <x-admin.table-data title="{{ $message->phone }}"/>
                    <x-admin.table-data title="Voir la discussion"/>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="text-center py-4 bg-white border">Pas de messages trouvés</td>
                </tr>
            @endforelse
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
            @forelse($this->treatedMessages as $message)
                <tr>
                    <x-admin.table-data title="{{ $message->name }}"/>
                    <x-admin.table-data title="{{ $message->email }}"/>
                    <x-admin.table-data title="{{ $message->phone }}"/>
                    <x-admin.table-data title="Voir la discussion"/>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="text-center py-4 bg-white border">Pas de messages trouvés</td>
                </tr>
            @endforelse
        </x-admin.table>
    </x-admin.section-spacing>
</main>
