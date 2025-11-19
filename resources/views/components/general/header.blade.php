<header>

    <nav class="flex items-center justify-between flex-wrap bg-white p-6">

        <div class="flex items-center flex-shrink-0 mr-6">
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

        <div id="nav-menu"
             class="w-full hidden peer-checked:block md:flex md:items-center md:w-auto font-bold">

            <div class="text-sm md:flex-grow">
                <a href="#"
                   class="block mt-4 md:inline-block md:mt-0 text-text-brown hover:underline mr-4">
                    Accueil
                </a>

                <a href="#"
                   class="block mt-4 md:inline-block md:mt-0 text-text-brown hover:underline transition-colors mr-4">
                    Nos animaux
                </a>

                <a href="#"
                   class="block mt-4 md:inline-block md:mt-0 text-text-brown hover:underline transition-colors md:mr-16">
                    Devenir bénévole
                </a>
            </div>

            <div>
                <a href="#"
                   class="inline-block text-sm px-5 py-3 leading-none border rounded text-white hover:bg-cta-hover bg-cta-orange border-cta-orange transition-colors mt-4 md:mt-0">
                    Contact
                </a>
            </div>

        </div>
    </nav>
</header>
