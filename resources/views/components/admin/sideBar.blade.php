{{--TODO: Responsive sidebar--}}
<aside class="w-64 bg-white shadow-md fixed left-0 top-20 bottom-0 overflow-y-auto z-40">
    <div class="p-6">
        <h2 class="sr-only">Navigation sur le coté</h2>
        <h3 class="text-2xl font-bold text-text-brown mb-6">Bonjour Elise</h3>
        <ul>
            <x-admin.listElement title="Tableau de bord" route="{{ route('admin.dashboard') }}"/>
            <x-admin.listElement title="Animaux" route="{{ route('admin.animals') }}"/>
            <x-admin.listElement title="Demande d'adoption" route="{{ route('admin.adoptions') }}"/>
            <x-admin.listElement title="Bénévoles" route="{{ route('admin.volunteers') }}"/>
            <x-admin.listElement title="Messages" route="{{ route('admin.messages') }}"/>
        </ul>
    </div>
</aside>
