{{--TODO: Responsive sidebar--}}
<nav class="w-64 bg-white shadow-md fixed left-0 top-20 bottom-0 overflow-y-auto z-40">
    <div class="p-6">
        <h2 class="sr-only">Navigation sur le coté</h2>
        <h3 class="text-2xl font-bold text-text-brown mb-6">{{ __('navigation.hello', ['name' => ucfirst(auth()->user()->name)]) }}</h3>
        <ul>
            <x-admin.listElement title="{{ __('navigation.dashboard') }}" route="{{ route('admin.dashboard') }}"/>
            <x-admin.listElement title="{{ __('navigation.animals') }}" route="{{ route('admin.animals') }}"/>
            <x-admin.listElement title="{{ __('navigation.adoptions') }}" route="{{ route('admin.adoptions') }}"/>
            <x-admin.listElement title="{{ __('navigation.volunteers') }}" route="{{ route('admin.volunteers') }}"/>
            <x-admin.listElement title="{{ __('navigation.messages') }}" route="{{ route('admin.messages') }}"/>
            <x-general.logout-button/>
        </ul>
    </div>
</nav>
