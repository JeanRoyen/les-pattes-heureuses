{{--TODO: Responsive sidebar--}}
<aside class="w-64 bg-white shadow-lg fixed left-0 top-20 bottom-0 overflow-y-auto z-40">
    <div class="p-6">
        <h2 class="text-2xl font-bold text-text-brown mb-6">Bonjour Elise</h2>
        <ul>
            <x-admin.listElement title="Tableau de bord" route="#"/>
            <x-admin.listElement title="Animaux" route="#"/>
            <x-admin.listElement title="Demande d'adoption" route="#"/>
            <x-admin.listElement title="Bénévoles" route="#"/>
            <x-admin.listElement title="Messages" route="#"/>
        </ul>
    </div>
</aside>
