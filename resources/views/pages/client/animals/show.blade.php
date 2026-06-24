<x-layouts.client title="{{ $animal->name }} | Les Pattes Heureuses">
    <div class="grid grid-cols-1 gap-8 lg:grid-cols-2">

        <div>
            <img
                src="{{ asset('storage/' . $animal->avatar) }}"
                alt="{{ $animal->name }}"
                class="aspect-4/5 w-7/10 rounded-2xl object-cover"
            >

        </div>

        <div class="space-y-6">

            <div class="flex items-start justify-between">
                <div>
                    <h1 class="text-5xl font-bold text-primary">
                        {{ $animal->name }}
                    </h1>

                    <div class="mt-4 space-y-1">
                        <p>{{ $animal->breed }}</p>
                        <p>{{ $animal->gender }}</p>
                        <p>Né le {{ $animal->age->format('d/m/Y') }}</p>
                    </div>
                </div>

                <span
                    class="rounded-full bg-green-600 px-6 py-2 text-white"
                >
                Disponible
            </span>
            </div>

            <p class="leading-relaxed text-gray-700">
                {{ $animal->description }}
            </p>

            <div>

            </div>

        </div>

    </div>

</x-layouts.client>
