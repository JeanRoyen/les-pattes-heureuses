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
        <h2 class="md:text-h2 font-bold">Une adoption, c'est le début d'une belle histoire d'amour</h2>
        <a href="#" class="bg-cta-orange text-white px-4 py-2 rounded-r-button">Voir tous nos pensionnaires</a>
    </section>
    <section>
        <h2 class="font-bold md:text-h2">Qui sommes-nous ? Pourquoi faisons nous cela ? </h2>
        <p>Les Pattes Heureuses est un refuge où chaque animal a droit à une seconde chance.Nous accueillons chiens,
            chats et autres compagnons laissés de côté, pour leur offrir les soins, l’attention et surtout l’amour
            qu’ils méritent.Notre équipe de bénévoles se consacre chaque jour à leur redonner confiance et à leur
            trouver une famille bienveillante.Parce qu’ici, chaque patte compte et chaque adoption est une belle
            histoire qui recommence.</p>
        <img src="{{ asset('images/shelter2.png') }}" alt="Illustration de fond">
    </section>
    <section class="bg-background-green">
        <h2 class="text-white font-bold md:text-h2">Nos nouveaux résidents</h2>
        <div class="bg-white inline-block rounded-card overflow-hidden max-w-[300px]">
            <div>
                <img src="{{ asset('images/dog1.png') }}" alt="" class="block w-full"/>
            </div>
            <div class="p-3">
                <span>3 ans</span>
                <h3>Bob</h3>
                <h4>Berger Malinois</h4>
                <p>Bob est très affectueux avec les enfants, même en bas âge, il est également fort énergique.</p>
            </div>
        </div>
    </section>
    <section>
        <h2 class="font-bold md:text-h2">Une question ? N'hésitez pas à nous contacter</h2>
        <div class="flex justify-center">
            <form action="/" class="bg-white inline-block shadow-general">
                <div class="md:flex">
                    <x-form.input name="name" title="Nom*" type="text" placeholder="Sarah "/>
                    <x-form.input name="phone" title="Numero de téléphone*" type="tel" placeholder="0471 42 08 46"/>
                </div>
                <div>
                    <x-form.input name="email" title="Adresse mail*" type="email" placeholder="Sarah@mail.be"/>
                </div>
                <div>
                    <x-form.textarea name="message" placeholder="Écrire mon message..."/>
                </div>
            </form>
        </div>
    </section>
</main>
<x-general.footer/>
</body>
</html>
