<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ __('animals.site_title') }}</title>
    @vite(['resources/css/app.css','resources/js/app.js'])
</head>
<body class="bg-bodybackground">
<x-general.header/>
<main>
    <section>
        <div class="lg:relative overflow-hidden">
            <img src="{{ asset('images/adopt-dog.png') }}" alt="" class="w-full lg:min-w-[1098px]">
            <div class="lg:absolute lg:inset-0 lg:flex lg:flex-col lg:py-4">
                <div class="container mx-auto px-4 md:px-0 md:mb-4">
                    <x-general.headings2
                        :title="__('animals.hero_title')"
                        color="text-black"/>
                    <p>
                        {{ __('animals.hero_text') }}
                        <span class="font-bold">{{ __('animals.shelter_name') }}</span>
                    </p>
                </div>

                <div class="container mx-auto px-4 md:px-0">
                    <div class="flex gap-2">
                        <x-general.square-infos
                            svg="dog"
                            number="{{ $dog }}"
                            :title="__('animals.stats_dogs')" />

                        <x-general.square-infos
                            svg="cat"
                            number="{{ $cat }}"
                            :title="__('animals.stats_cats')" />

                        <x-general.square-infos
                            svg="human"
                            number="{{ $adopted }}"
                            :title="__('animals.stats_adopted')" />
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="mt-8 md:mt-12">
        <div class="container mx-auto px-4 md:px-0 space-y-2">
            <x-general.headings2
                color="black"
                :title="__('animals.list_title')" />
            <div class="grid grid-cols-8 gap-5">
                <x-general.select name="species" title="Espèces">
                    <option selected>Choisir une espèce</option>
                    <option value="1">test</option>
                    <option value="2">test</option>
                </x-general.select>

                <x-general.select name="races" title="Races">
                    <option selected>Choisir une race</option>
                    <option value="1">test</option>
                    <option value="2">test</option>
                </x-general.select>

                <x-general.select name="sex" title="Sexe">
                    <option selected>Choisir un sexe</option>
                    <option value="1">test</option>
                    <option value="2">test</option>
                </x-general.select>

                <x-general.select name="age" title="Âge">
                    <option selected>Choisir un âge</option>
                    <option value="1">test</option>
                    <option value="2">test</option>
                </x-general.select>
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
            {{-- TODO: Pagination --}}
        </div>
    </section>
</main>
<x-general.footer/>
</body>
</html>

