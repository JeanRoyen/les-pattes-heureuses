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
        <h2 class="text-h2 md:text-h2-desktop font-bold">Une adoption, c'est le début d'une belle histoire d'amour</h2>
        <a href="#" class="bg-cta-orange hover:bg-cta-hover text-white px-4 py-2 rounded-r-button font-bold">
            Voir tous nos pensionnaires
        </a>
    </section>
    <section>
        <h2 class="font-bold text-h2 md:text-h2-desktop">Qui sommes-nous ? Pourquoi faisons nous cela ? </h2>
        <p>
            Les Pattes Heureuses est un refuge où chaque animal a droit à une seconde chance.Nous accueillons chiens,
            chats et autres compagnons laissés de côté, pour leur offrir les soins, l’attention et surtout l’amour
            qu’ils méritent.Notre équipe de bénévoles se consacre chaque jour à leur redonner confiance et à leur
            trouver une famille bienveillante.Parce qu’ici, chaque patte compte et chaque adoption est une belle
            histoire qui recommence.
        </p>
        <img src="{{ asset('images/shelter2.png') }}" alt="Illustration de fond">
    </section>
    <section class="bg-background-green">
        <h2 class="text-white font-bold text-h2 md:text-h2-desktop">Nos nouveaux résidents</h2>
        <div class="flex mx-20 justify-center gap-4 pb-10 flex-wrap">
            <x-general.card/>
            <x-general.card/>
            <x-general.card/>
            <x-general.card/>
        </div>
    </section>
    <section>
        <h2 class="font-bold text-h2 md:text-h2-desktop">Une question ? N'hésitez pas à nous contacter !</h2>
        <div class="flex justify-center mb-16">
            <x-form.contactForm/>
        </div>
    </section>
</main>
<x-general.footer/>
</body>
</html>
