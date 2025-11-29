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
    <div class="flex flex-col justify-center items-center m-10">
        <div>
            <img src="{{ asset('images/LPH_logo.png') }}" alt="" width="200">
        </div>
        <div class="md:w-1/2 w-full">
            <form action="/"
                  class="bg-white shadow-general rounded-card p-4 md:p-8">
                <div class="mb-4">
                    <x-form.input name="email" title="Adresse mail*" type="email" placeholder="Sarah@mail.be"/>
                </div>
                <div class="mb-4">
                    <x-form.input name="password" title="Mot de passe*" type="password" placeholder="********"/>
                </div>
                <div>
                    <x-form.button title="Se connecter"/>
                </div>
                <div class="pt-4">
                    <a href="#" class="underline hover:text-background-green">Mot de passe oublié</a>
                </div>
            </form>
        </div>
    </div>
</main>
</body>
</html>
