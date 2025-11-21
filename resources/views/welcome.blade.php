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
        <x-general.headings2 title="Une adoption, c'est le début d'une belle histoire d'amour" color="text-black"/>
        <a href="#" class="bg-cta-orange hover:bg-cta-hover text-white px-4 py-2 rounded-r-button font-bold">
            Voir tous nos pensionnaires
        </a>
    </section>
    <section>
        <x-general.headings2 title="Qui sommes-nous ? Pourquoi faisons nous cela ?" color="text-black" />
        <p>
            Les Pattes Heureuses est un refuge où chaque animal a droit à une seconde chance.Nous accueillons chiens,
            chats et autres compagnons laissés de côté, pour leur offrir les soins, l’attention et surtout l’amour
            qu’ils méritent. Notre équipe de bénévoles se consacre chaque jour à leur redonner confiance et à leur
            trouver une famille bienveillante. Parce qu’ici, chaque patte compte et chaque adoption est une belle
            histoire qui recommence.
        </p>
        <img src="{{ asset('images/shelter2.png') }}" alt="Illustration de fond">
    </section>
    <section class="bg-background-green py-8 md:py-12">
        <div class="container mx-auto px-4 md:px-0">
            <x-general.headings2 title="Nos nouveaux résidents" color="text-white" />
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 md:gap-6">
                <x-general.card name="Bob" race="Berger Allemand" age="8 ans" description="Bob est un chien affectueux il peut tout à fait vivre avec d'autres animaux." />
                <x-general.card name="Norbert" race="Berger Allemand" age="4 ans" description="Norbert est un chien affectueux il peut tout à fait vivre avec d'autres animaux." />
                <x-general.card name="Patrick" race="Berger Allemand" age="8 ans" description="Patrick est un chien affectueux il peut tout à fait vivre avec d'autres animaux." />
                <x-general.card name="Fernando" race="Berger Allemand" age="2 ans" description="Fernando est un chien affectueux il peut tout à fait vivre avec d'autres animaux." />
            </div>
        </div>
    </section>
    <section>
        <x-general.headings2 title="Une question ? N'hésitez pas à nous contacter !" color="text-black" />
        <div class="flex justify-center mb-16 mx-20">
            <x-form.contactForm/>
        </div>
    </section>
</main>
<x-general.footer/>
</body>
</html>
