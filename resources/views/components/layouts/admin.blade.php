<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $title ?? config('app.name') }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @livewireStyles
</head>
<body class="bg-bodybackground">
<x-general.header/>
<div class="flex py-6 px-8">
    <x-admin.sideBar/>
    {{ $slot }}
</div>

@livewireScripts
</body>
</html>
