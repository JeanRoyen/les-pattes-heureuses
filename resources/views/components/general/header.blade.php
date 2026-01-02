<header class="sticky z-9999 w-full top-0">
    <nav class="flex items-center justify-between flex-wrap bg-white shadow-general">
        <div class="container mx-auto px-4 md:px-0 pb-4 md:pb-0 flex items-center justify-between flex-wrap w-full">
            <h2 class="sr-only">{{ __('header.main_navigation') }}</h2>

            <div class="flex items-center flex-shrink-0">
                <a href="{{ route('welcome') }}">
                    <img src="{{ asset('images/LPH_logo.png') }}"
                         alt="{{ __('header.logo_alt') }}"
                         width="80">
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
                    <x-navigation.topLink
                        :title="__('header.nav_home')"
                        route="{{ route('welcome') }}" />

                    <x-navigation.topLink
                        :title="__('header.nav_animals')"
                        route="{{ route('pages.animals-list') }}"/>

                    <x-navigation.topButton
                        route="/#contact"
                        :title="__('header.nav_contact')"/>
                </div>

                <div x-data="{ open:false }" class="relative Æmt-4 md:mt-0 md:ml-4">
                    <button @click="open = !open"
                            class="flex items-center px-3 py-2 border rounded text-text hover:bg-hover">
                        {{ __('language.language_selector') }}
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                  d="M5.23 7.21a.75.75 0 011.06.02L10 11.17l3.71-3.94a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z"
                                  clip-rule="evenodd"/>
                        </svg>
                    </button>

                    <ul x-show="open"
                        @click.outside="open = false"
                        class="absolute right-0 bg-white shadow-md rounded-md mt-1 w-36 text-left z-50">
                        <li>
                            <a href="{{ url('/lang/fr') }}"
                               class="flex items-center px-3 py-2 hover:bg-gray-100 {{ session('locale') === 'fr' ? 'bg-gray-200' : '' }}">
                                {{ __('footer.lang_fr') }}
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('/lang/nl') }}"
                               class="flex items-center px-3 py-2 hover:bg-gray-100 {{ session('locale') === 'nl' ? 'bg-gray-200' : '' }}">
                                {{ __('footer.lang_nl') }}
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('/lang/en') }}"
                               class="flex items-center px-3 py-2 hover:bg-gray-100 {{ session('locale') === 'en' ? 'bg-gray-200' : '' }}">
                                {{ __('footer.lang_en') }}
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
</header>
