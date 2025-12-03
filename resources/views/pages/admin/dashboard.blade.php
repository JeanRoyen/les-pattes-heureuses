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
<div class="flex">
    <x-admin.sideBar/>
    <main class="flex-1 ml-64 overflow-y-auto">
        <section>
            <x-admin.headings2 title="Demandes et messages"/>
            <x-admin.square-infos-container>
                <x-general.square-infos number="1" title="Demandes d'adoptions" svg="contact"/>
                <x-general.square-infos number="3" title="Messages reçus" svg="mail"/>
            </x-admin.square-infos-container>
        </section>
        <section>
            <x-admin.headings2 title="Résumé mensuel"/>
            <x-admin.square-infos-container>
                <x-general.square-infos number="23" title="Chiens au refuge" svg="dog"/>
                <x-general.square-infos number="33" title="Chats au refuge" svg="cat"/>
                <x-general.square-infos number="56" title="Sont au refuge" svg="shelter"/>
                <x-general.square-infos number="5" title="Ont quitté" svg="circled-minus"/>
                <x-general.square-infos number="9" title="Sont arrivé refuge" svg="circled-plus"/>
            </x-admin.square-infos-container>
        </section>
    </main>
</div>
</body>
</html>
