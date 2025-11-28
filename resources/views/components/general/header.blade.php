<header class="sticky z-9999 w-full top-0">
    <nav class="flex items-center justify-between flex-wrap bg-white shadow-general">
        <div class="container mx-auto px-4 md:px-0 pb-4 md:pb-0  flex items-center justify-between flex-wrap w-full">
            <h2 class="sr-only">Navigation principale</h2>
            <div class="flex items-center flex-shrink-0">
                <a href="{{ route('welcome') }}"><img src="{{ asset('images/LPH_logo.png') }}" alt="Logo les pattes heureuses" width="80">
                </a>
            </div>
            <input type="checkbox" id="menu-toggle" class="peer hidden">
            <label for="menu-toggle"
                   class="md:hidden flex items-center px-3 py-2 border rounded text-text-brown border-b-cta-orange cursor-pointer">
                <svg class="fill-current h-4 w-4" viewBox="0 0 20 20">
                    <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"/>
                </svg>
            </label>
            <div class="w-full hidden peer-checked:block md:flex md:items-center md:w-auto font-bold">
                <div class="text-sm md:flex-grow">
                    <x-navigation.topLink title="Accueil" route="{{ route('welcome') }}" />
                    <x-navigation.topLink title="Nos animaux" route="{{ route('pages.animals-list') }}"/>
                    <x-navigation.topLink title="Devenir bénévole" route="#"/>
                    <x-navigation.topButton route="#" title="Contact"/>
                </div>
            </div>
        </div>
    </nav>
</header>
