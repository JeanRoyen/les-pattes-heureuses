<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ __('welcome.site_title') }}</title>
    @vite(['resources/css/app.css','resources/js/app.js'])
</head>
<body class="bg-bodybackground">
<x-general.header/>
<main>
    <section>
        <div class="lg:relative overflow-hidden">
            <img src="{{ asset('images/forest_dog.png') }}" alt="" class="w-full lg:min-w-[1098px] shadow-general">
            <div class="lg:absolute lg:inset-0 lg:flex lg:flex-col lg:justify-between lg:py-12">
                <div class="container mx-auto px-4 md:px-0">
                    <h2 class="font-bold text-h2 md:text-h2-desktop lg:text-5xl mb-6 lg:mb-8 mt-4 md:mt-0 lg:leading-16 lg:text-white lg:max-w-1/2">
                        {{ __('welcome.hero_title') }}
                    </h2>
                </div>
                <div class="container mx-auto px-4 md:px-0">
                    <a href="#"
                       class="bg-cta-orange hover:bg-cta-hover text-white px-4 py-2 rounded-button font-bold inline-block">
                        {{ __('welcome.hero_cta') }}
                    </a>
                </div>
            </div>
        </div>
    </section>
    <section class="mt-8 md:mt-12">
        <div class="container mx-auto px-4 md:px-0">
            <x-general.headings2
                :title="__('welcome.about_title')"
                color="text-black"/>

            <p>
                {{ __('welcome.about_text') }}
            </p>

            <div class="h-1/2 mt-6">
                <img src="{{ asset('images/group_with_human.jpg') }}" alt="Girl with dogs" class="shadow-general rounded-card w-full">
            </div>
        </div>
    </section>
    <section class="mt-8 md:mt-12">
        <div class="container mx-auto px-4 md:px-0">
            <x-general.headings2
                :title="__('welcome.new_residents_title')"
                color="text-black"/>

            <div class="grid grid-cols-8 gap-5">
                @foreach($animals as $animal)
                    <x-general.card
                        name="{{ $animal->name }}"
                        race="{{ $animal->race }}"
                        gender="{{ $animal->gender }}"
                        age="{{ $animal->age->format('d/m/Y') }}"
                        description="{{ $animal->description }}"
                        :picture="$animal->avatar"/>
                @endforeach
            </div>
        </div>
    </section>
    <section class="mt-8 md:mt-12">
        <div class="container mx-auto px-4 md:px-0">
            <x-general.headings2
                :title="__('welcome.contact_title')"
                color="text-black"/>
            <div class="flex justify-center">
                <x-form.contactForm/>
            </div>
        </div>
    </section>
</main>
<x-general.footer/>
</body>
</html>
