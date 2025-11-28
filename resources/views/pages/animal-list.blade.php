<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Les Pattes Heureuses</title>
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
                    <x-general.headings2 title="Envie d'adopter ?" color="text-black"/>
                    <p>Découvrez tous les animaux se trouvant au refuge <span
                            class="font-bold">Les pattes heureuses</span></p>
                </div>
                <div class="container mx-auto px-4 md:px-0">
                    <div class="flex gap-2">
                        <x-general.square-infos svg="dog" number="23" title="Chiens au refuge"/>
                        <x-general.square-infos svg="cat" number="32" title="Chats au refuge"/>
                        <x-general.square-infos svg="human" number="149" title="Ont quitté le refuge"/>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="mt-8 md:mt-12">
        <div class="container mx-auto px-4 md:px-0">
            <x-general.headings2 color="black" title="Découvrez nos petits (et grands) pensionnaires"/>
            <x-general.searchbar/>
            <div class="grid grid-cols-8 gap-5">
                <x-general.select name="species" title="Espèces">
                    <option selected>Choisir une espèce</option>
                    <option value="1">Chien</option>
                    <option value="2">Chat</option>
                </x-general.select>
                <x-general.select name="races" title="Races">
                    <option selected>Choisir une race</option>
                    <option value="1">Berger Allemand</option>
                    <option value="2">Berger Malinois</option>
                </x-general.select>
                <x-general.select name="sex" title="Sexe">
                    <option selected>Choisir un sexe</option>
                    <option value="1">Mâle</option>
                    <option value="2">Femelle</option>
                </x-general.select>
                <x-general.select name="age" title="Âge">
                    <option selected>Choisir un âge</option>
                    <option value="1">2-4 ans</option>
                    <option value="2">5-7 ans</option>
                </x-general.select>
                <x-general.card name="Bob" race="Berger Allemand" age="8 ans"
                                description="Bob est un chien affectueux il peut tout à fait vivre avec d'autres animaux."
                :picture="asset('images/dog1.png')"/>
                <x-general.card name="Norbert" race="Corgi" age="8 ans"
                                description="Bob est un chien affectueux il peut tout à fait vivre avec d'autres animaux."
                                :picture="asset('images/dog2.jpg')"/>
                <x-general.card name="Bob" race="Berger Allemand" age="8 ans"
                                description="Bob est un chien affectueux il peut tout à fait vivre avec d'autres animaux."
                                :picture="asset('images/dog1.png')"/>
                <x-general.card name="Norbert" race="Corgi" age="8 ans"
                                description="Bob est un chien affectueux il peut tout à fait vivre avec d'autres animaux."
                                :picture="asset('images/dog2.jpg')"/>
                <x-general.card name="Bob" race="Berger Allemand" age="8 ans"
                                description="Bob est un chien affectueux il peut tout à fait vivre avec d'autres animaux."
                                :picture="asset('images/dog1.png')"/>
                <x-general.card name="Norbert" race="Corgi" age="8 ans"
                                description="Bob est un chien affectueux il peut tout à fait vivre avec d'autres animaux."
                                :picture="asset('images/dog2.jpg')"/>
                <x-general.card name="Bob" race="Berger Allemand" age="8 ans"
                                description="Bob est un chien affectueux il peut tout à fait vivre avec d'autres animaux."
                                :picture="asset('images/dog1.png')"/>
                <x-general.card name="Norbert" race="Corgi" age="8 ans"
                                description="Bob est un chien affectueux il peut tout à fait vivre avec d'autres animaux."
                                :picture="asset('images/dog2.jpg')"/>
                <x-general.card name="Bob" race="Berger Allemand" age="8 ans"
                                description="Bob est un chien affectueux il peut tout à fait vivre avec d'autres animaux."
                                :picture="asset('images/dog1.png')"/>
                <x-general.card name="Norbert" race="Corgi" age="8 ans"
                                description="Bob est un chien affectueux il peut tout à fait vivre avec d'autres animaux."
                                :picture="asset('images/dog2.jpg')"/>
            </div>
            {{-- TODO: Pagination --}}
        </div>
    </section>
</main>
<x-general.footer/>
</body>
</html>
