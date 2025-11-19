<header>

    <nav class="flex items-center justify-between flex-wrap bg-white p-6 shadow-general">
        <h2 class="sr-only">Navigation principale</h2>
        <div class="flex items-center flex-shrink-0">
            <a href="#"><img src="{{ asset('images/LPH_logo.png') }}" alt="Logo les pattes heureuses" width="88">
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
                <x-navigation.topLink title="Accueil" route="#"/>
                <x-navigation.topLink title="Nos animaux" route="#"/>
                <x-navigation.topLink title="Devenir bénévole" route="#"/>
                <x-navigation.topButton route="#" title="Contact"/>
            </div>
        </div>
    </nav>
</header>
