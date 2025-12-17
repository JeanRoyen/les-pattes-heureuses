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
<div class="flex py-6 px-8">
    <x-admin.sideBar/>
    <main class="flex-1 ml-64 space-y-10">
        <x-admin.section-spacing>
            <x-admin.headings2 title="Messages en attente"/>
            <x-general.searchbar/>
            <x-admin.table>
                <tr>
                    <x-admin.table-header title="Nom"/>
                    <x-admin.table-header title="Email"/>
                    <x-admin.table-header title="Téléphone"/>
                    <x-admin.table-header title="Actions"/>
                </tr>
                <tr>
                    <x-admin.table-data title="Sarah"/>
                    <x-admin.table-data title="Sarah@adopte.be"/>
                    <x-admin.table-data title="04 02 12 12 42"/>
                    <x-admin.table-data title="Voir la discussion"/>
                </tr>
            </x-admin.table>
            {{-- TODO: Paginate --}}
        </x-admin.section-spacing>
        <x-admin.section-spacing>
            <x-admin.headings2 title="Messages traités"/>
            <x-general.searchbar/>
            <x-admin.table>
                <tr>
                    <x-admin.table-header title="Nom"/>
                    <x-admin.table-header title="Email"/>
                    <x-admin.table-header title="Téléphone"/>
                    <x-admin.table-header title="Actions"/>
                </tr>
                <tr>
                    <x-admin.table-data title="Sarah"/>
                    <x-admin.table-data title="Sarah@adopte.be"/>
                    <x-admin.table-data title="04 02 12 12 42"/>
                    <x-admin.table-data title="Voir la discussion"/>
                </tr>
                <tr>
                    <x-admin.table-data title="Sarah"/>
                    <x-admin.table-data title="Sarah@adopte.be"/>
                    <x-admin.table-data title="04 02 12 12 42"/>
                    <x-admin.table-data title="Voir la discussion"/>
                </tr>
            </x-admin.table>
        </x-admin.section-spacing>
    </main>
</div>
</body>
</html>
