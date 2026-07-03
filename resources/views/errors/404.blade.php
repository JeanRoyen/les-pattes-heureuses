<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page introuvable | 404</title>
    @vite(['resources/css/app.css'])
</head>

<body class="min-h-screen flex items-center justify-center bg-gray-50">

<div class="text-center max-w-md p-8">

    <h1 class="text-4xl font-bold text-red-500 mb-4">
        404
    </h1>

    <h1 class="text-2xl font-semibold text-gray-800 mb-2">
        Page introuvable
    </h1>

    <p class="text-gray-600 mb-6">
        La page que vous recherchez n’existe pas ou a été déplacée.
    </p>

    <div class="flex justify-center gap-4">
        <a href="{{ route('admin.dashboard') }}"
           class="px-5 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-100 transition">
            Retour au dashboard
        </a>
    </div>

</div>

</body>
</html>
