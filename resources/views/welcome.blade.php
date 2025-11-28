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
            <img src="{{ asset('images/forest_dog.png') }}" alt="" class="w-full lg:min-w-[1098px] shadow-general">
            <div class="lg:absolute lg:inset-0 lg:flex lg:flex-col lg:justify-between lg:py-12">
                <div class="container mx-auto px-4 md:px-0">
                    <h2 class="font-bold text-h2 md:text-h2-desktop lg:text-5xl mb-6 lg:mb-8 mt-4 md:mt-0 lg:leading-16 lg:text-white lg:max-w-1/2">
                        Une adoption, c'est le début d'une belle histoire d'amour</h2>
                </div>
                <div class="container mx-auto px-4 md:px-0">
                    <a href="#"
                       class="bg-cta-orange hover:bg-cta-hover text-white px-4 py-2 rounded-button font-bold inline-block">
                        Voir tous nos pensionnaires
                    </a>
                </div>
            </div>
        </div>
    </section>
    <section class="mt-8 md:mt-12">
        <div class="container mx-auto px-4 md:px-0">
            <x-general.headings2 title="Qui sommes-nous ? Pourquoi faisons nous cela ?" color="text-black"/>
            <p>
                Les Pattes Heureuses est un refuge où chaque animal a droit à une seconde chance. Nous accueillons
                chiens,
                chats et autres compagnons laissés de côté, pour leur offrir les soins, l’attention et surtout l’amour
                qu’ils méritent. Notre équipe de bénévoles se consacre chaque jour à leur redonner confiance et à leur
                trouver une famille bienveillante. Parce qu’ici, chaque patte compte et chaque adoption est une belle
                histoire qui recommence.
            </p>
            <div class="h-1/2 mt-6">
                <img src="{{ asset('images/group_with_human.jpg') }}" alt="Illustration de fond" class="shadow-general rounded-card">
            </div>
        </div>
    </section>
    <section class="mt-8 md:mt-12">
        <div class="container mx-auto px-4 md:px-0">
            <x-general.headings2 title="Nos nouveaux résidents" color="text-black"/>
            <div class="grid grid-cols-8 gap-5">
                <x-general.card name="Bob" race="Berger Allemand" age="8 ans"
                                description="Bob est un chien affectueux il peut tout à fait vivre avec d'autres animaux."/>
                <x-general.card name="Norbert" race="Berger Allemand" age="4 ans"
                                description="Norbert est un chien affectueux il peut tout à fait vivre avec d'autres animaux."/>
                <x-general.card name="Patrick" race="Berger Allemand" age="8 ans"
                                description="Patrick est un chien affectueux il peut tout à fait vivre avec d'autres animaux."/>
                <x-general.card name="Fernando" race="Berger Allemand" age="2 ans"
                                description="Fernando est un chien affectueux il peut tout à fait vivre avec d'autres animaux."/>
            </div>
        </div>
    </section>
    <section class="mt-8 md:mt-12">
        <div class="container mx-auto px-4 md:px-0">
            <x-general.headings2 title="Une question ? N'hésitez pas à nous contacter !" color="text-black"/>
            <div class="flex justify-center">
                <x-form.contactForm/>
            </div>
        </div>
    </section>
</main>
<x-general.footer/>
</body>
</html>
