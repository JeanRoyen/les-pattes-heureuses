<footer class="bg-white text-text-brown mt-8 md:mt-12">
    <div class="container mx-auto px-4 lg:px-0 lg:flex lg:justify-between py-6">
        <div class="mb-4 md:mb-0">
            <ul>
                <nav>
                    <h2 class="font-bold">{{ __('footer.navigation_title') }}</h2>
                    <li class="hover:underline"><a href="#">{{ __('footer.nav_home') }}</a></li>
                    <li class="hover:underline"><a href="#">{{ __('footer.nav_animals') }}</a></li>
                    <li class="hover:underline"><a href="#">{{ __('footer.nav_adoption') }}</a></li>
                    <li class="hover:underline"><a href="#">{{ __('footer.nav_volunteer') }}</a></li>
                    <li class="hover:underline"><a href="#">{{ __('footer.nav_contact') }}</a></li>
                </nav>
            </ul>
        </div>

        <div class="mb-4 lg:mb-0">
            <h2 class="font-bold">{{ __('footer.contact_title') }}</h2>
            <ul>
                <li><a href="tel:+32471420854" class="hover:underline">0471 42 08 54</a></li>
                <li><a href="mailto:jeanroyen2@hotmail.com" class="hover:underline">jeanroyen2@hotmail.com</a></li>
                <li>
                    <p>{{ __('footer.address_line_1') }}</p>
                    <p>{{ __('footer.address_line_2') }}</p>
                </li>
            </ul>
        </div>

        <div class="mb-4 lg:mb-0">
            <h2 class="font-bold">{{ __('footer.hours_title') }}</h2>
            <div>
                <p>
                    <span class="font-bold">{{ __('footer.hours_days') }}</span>
                    {{ __('footer.hours_time') }}
                </p>
                <p>{{ __('footer.hours_closed') }}</p>
            </div>
        </div>

        <div class="mb-4 lg:mb-0">
            <h2 class="font-bold">{{ __('footer.languages_title') }}</h2>
            <ul>
                <li class="hover:underline"><a href="{{ url('/lang/fr') }}">{{ __('footer.lang_fr') }}</a></li>
                <li class="hover:underline"><a href="{{ url('/lang/en') }}">{{ __('footer.lang_en') }}</a></li>
                <li class="hover:underline"><a href="{{ url('/lang/nl') }}">{{ __('footer.lang_nl') }}</a></li>
            </ul>
        </div>

        <div>
            <img src="{{ asset('images/LPH_logo.png') }}"
                 alt="{{ __('footer.logo_alt') }}"
                 class="w-30 md:w-20">
        </div>
    </div>
</footer>
