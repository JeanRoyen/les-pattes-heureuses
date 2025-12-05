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
            <x-admin.headings2 title="Animaux au refuge"/>
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
            </div>
            <x-admin.table>
                <tr>
                    <x-admin.table-header title="Nom"/>
                    <x-admin.table-header title="Espèce"/>
                    <x-admin.table-header title="Description"/>
                    <x-admin.table-header title="Sexe"/>
                    <x-admin.table-header title="Naissance"/>
                    <x-admin.table-header title="Vaccins"/>
                    <x-admin.table-header title="Status"/>
                    <x-admin.table-header title="Action"/>
                </tr>
                <tr>
                    <x-admin.table-data title="Bob"/>
                    <x-admin.table-data title="Berger Allemand"/>
                    <x-admin.table-data title="Adorable avec les enfants ce berger Allem..."/>
                    <x-admin.table-data title="Mâle"/>
                    <x-admin.table-data title="24/03/2025"/>
                    <x-admin.table-data title="À jour"/>
                    <x-admin.table-data title="Disponible"/>
                    <x-admin.table-data title="Supprimer / Voir"/>
                </tr>
                <tr>
                    <x-admin.table-data title="Bob"/>
                    <x-admin.table-data title="Berger Allemand"/>
                    <x-admin.table-data title="Adorable avec les enfants ce berger Allem..."/>
                    <x-admin.table-data title="Mâle"/>
                    <x-admin.table-data title="24/03/2025"/>
                    <x-admin.table-data title="À jour"/>
                    <x-admin.table-data title="Disponible"/>
                    <x-admin.table-data title="Supprimer / Voir"/>
                </tr>
                <tr>
                    <x-admin.table-data title="Bob"/>
                    <x-admin.table-data title="Berger Allemand"/>
                    <x-admin.table-data title="Adorable avec les enfants ce berger Allem..."/>
                    <x-admin.table-data title="Mâle"/>
                    <x-admin.table-data title="24/03/2025"/>
                    <x-admin.table-data title="À jour"/>
                    <x-admin.table-data title="Disponible"/>
                    <x-admin.table-data title="Supprimer / Voir"/>
                </tr>
            </x-admin.table>
            {{-- TODO: Paginate --}}
            <x-admin.cta title="Ajouter un animal" />
        </x-admin.section-spacing>
        <x-admin.section-spacing>
            <x-admin.headings2 title="Animaux en attente de validation"/>
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
            </div>
            <x-admin.table>
                <tr>
                    <x-admin.table-header title="Nom"/>
                    <x-admin.table-header title="Espèce"/>
                    <x-admin.table-header title="Description"/>
                    <x-admin.table-header title="Sexe"/>
                    <x-admin.table-header title="Naissance"/>
                    <x-admin.table-header title="Vaccins"/>
                    <x-admin.table-header title="Action"/>
                </tr>
                <tr>
                    <x-admin.table-data title="Bob"/>
                    <x-admin.table-data title="Berger Allemand"/>
                    <x-admin.table-data title="Adorable avec les enfants ce berger Allem..."/>
                    <x-admin.table-data title="Mâle"/>
                    <x-admin.table-data title="24/03/2025"/>
                    <x-admin.table-data title="À jour"/>
                    <x-admin.table-data title="Supprimer / Voir"/>
                </tr>
                <tr>
                    <x-admin.table-data title="Bob"/>
                    <x-admin.table-data title="Berger Allemand"/>
                    <x-admin.table-data title="Adorable avec les enfants ce berger Allem..."/>
                    <x-admin.table-data title="Mâle"/>
                    <x-admin.table-data title="24/03/2025"/>
                    <x-admin.table-data title="À jour"/>
                    <x-admin.table-data title="Supprimer / Voir"/>
                </tr>
                <tr>
                    <x-admin.table-data title="Bob"/>
                    <x-admin.table-data title="Berger Allemand"/>
                    <x-admin.table-data title="Adorable avec les enfants ce berger Allem..."/>
                    <x-admin.table-data title="Mâle"/>
                    <x-admin.table-data title="24/03/2025"/>
                    <x-admin.table-data title="À jour"/>
                    <x-admin.table-data title="Supprimer / Voir"/>
                </tr>
            </x-admin.table>
        </x-admin.section-spacing>
        <x-admin.section-spacing>
            <x-admin.headings2 title="Animaux adoptés"/>
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
            </div>
            <x-admin.table>
                <tr>
                    <x-admin.table-header title="Nom"/>
                    <x-admin.table-header title="Espèce"/>
                    <x-admin.table-header title="Description"/>
                    <x-admin.table-header title="Sexe"/>
                    <x-admin.table-header title="Naissance"/>
                    <x-admin.table-header title="Vaccins"/>
                    <x-admin.table-header title="Status"/>
                    <x-admin.table-header title="Action"/>
                </tr>
                <tr>
                    <x-admin.table-data title="Bob"/>
                    <x-admin.table-data title="Berger Allemand"/>
                    <x-admin.table-data title="Adorable avec les enfants ce berger Allem..."/>
                    <x-admin.table-data title="Mâle"/>
                    <x-admin.table-data title="24/03/2025"/>
                    <x-admin.table-data title="À jour"/>
                    <x-admin.table-data title="Disponible"/>
                    <x-admin.table-data title="Supprimer / Voir"/>
                </tr>
                <tr>
                    <x-admin.table-data title="Bob"/>
                    <x-admin.table-data title="Berger Allemand"/>
                    <x-admin.table-data title="Adorable avec les enfants ce berger Allem..."/>
                    <x-admin.table-data title="Mâle"/>
                    <x-admin.table-data title="24/03/2025"/>
                    <x-admin.table-data title="À jour"/>
                    <x-admin.table-data title="Disponible"/>
                    <x-admin.table-data title="Supprimer / Voir"/>
                </tr>
                <tr>
                    <x-admin.table-data title="Bob"/>
                    <x-admin.table-data title="Berger Allemand"/>
                    <x-admin.table-data title="Adorable avec les enfants ce berger Allem..."/>
                    <x-admin.table-data title="Mâle"/>
                    <x-admin.table-data title="24/03/2025"/>
                    <x-admin.table-data title="À jour"/>
                    <x-admin.table-data title="Disponible"/>
                    <x-admin.table-data title="Supprimer / Voir"/>
                </tr>
            </x-admin.table>
            {{-- TODO: Paginate --}}
        </x-admin.section-spacing>
    </main>
</div>
</body>
</html>
