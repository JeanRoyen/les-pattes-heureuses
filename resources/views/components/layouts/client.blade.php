<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $title ?? config('app.name') }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>
<body class="bg-bodybackground flex min-h-screen flex-col">
<h1 class="sr-only">{{ $page_title }}</h1>
<x-general.header/>
<div class="flex flex-1">
    {{ $slot }}
</div>
@if (session('success'))
    <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 3000)" x-show="show" class="flex justify-center ">
        <div class="bg-green-100 border border-green-400 text-green-800 px-8 py-5 rounded-2xl shadow-xl max-w-md text-center">
            {{ session('success') }}
        </div>
    </div>
@endif
<x-general.footer/>
@livewireScripts
</body>
</html>
