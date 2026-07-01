<x-layouts.client title="{{ $animal->name }} | Les Pattes Heureuses">
    <x-slot:page_title>
        Page de {{ $animal->name }}
    </x-slot:page_title>

    <div class="mx-auto max-w-6xl px-4 py-10">
        <div class="grid grid-cols-1 items-start gap-10 lg:grid-cols-2">

            <div>
                <img
                    src="{{ asset('storage/' . $animal->avatar) }}"
                    alt="{{ $animal->name }}"
                    class="aspect-4/5 w-full rounded-2xl object-cover"
                >
            </div>

            <div class="overflow-hidden rounded-2xl border border-gray-200 bg-white">

                <div class="p-8">
                    <div class="flex items-start justify-between gap-4">
                        <h1 class="text-4xl font-bold text-primary">
                            {{ $animal->name }}
                        </h1>
                        <x-adoption.status :status="$animal->status" />
                    </div>

                    <div class="mt-3 space-y-1 text-gray-700">
                        <p>{{ $animal->breed->name }}</p>
                        <p>{{ $animal->gender ? 'Mâle' : 'Femelle' }}</p>
                        <p>Née le {{ $animal->age->format('d/m/Y') }}</p>
                    </div>

                    <div class="mt-5 border-t border-gray-100 pt-5">
                        @if(!$animal->description)
                            <p>{{ $animal->name }} n'a pas de description.</p>
                            <p class="text-[15px] leading-relaxed text-gray-500">
                                Vous pouvez téléphoner au
                                <x-general.link href="tel:0471420854" title="04 71 42 08 54"/>
                                ou nous contacter via
                                <x-general.link href="/#contact" title="notre formulaire de contact"/>
                                pour avoir plus d'informations.
                            </p>
                        @else
                            <p class="text-[15px] leading-relaxed text-gray-500">
                                {{ $animal->description }}
                            </p>
                        @endif
                    </div>

                    <div class="mt-6">
                        <p class="mb-1 text-xs font-medium uppercase tracking-wider text-gray-400">Vaccins</p>
                        <p class="font-medium {{ $animal->vaccine ? 'text-green-700' : 'text-amber-700' }}">
                            {{ $animal->vaccine ? 'À jour' : 'À faire' }}
                        </p>
                    </div>
                </div>

                <div class="border-t border-gray-100 bg-gray-50 p-8">
                    <h2 class="mb-6 text-center text-xl font-semibold text-gray-900">
                        Formulaire d'adoption de {{ $animal->name }}
                    </h2>

                    {{-- Formulaire de contact --}}
                    <form action="{{ route('animals.store') }}" method="POST" class="space-y-5">
                        @csrf
                        <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                            <x-form.client_input
                                name="name"
                                title="Nom"
                                placeholder="Chloé"
                                type="text"
                            />
                            <x-form.client_input
                                name="phone"
                                title="Téléphone"
                                placeholder="0471 42 08 54"
                                type="tel"
                            />
                        </div>

                        <x-form.client_input
                            name="email"
                            title="Email"
                            placeholder="Chloe@mail.be"
                            type="email"
                        />

                        <x-form.client_textarea
                            name="message"
                            title="Message"
                            placeholder="Vos raisons d'adoptions..."
                        />
                        <button type="submit"
                                class="flex w-full items-center justify-center gap-2 rounded-lg bg-orange-400 px-4 py-3 font-medium text-white transition-colors hover:bg-orange-500">
                            Enregistrer ma demande d'adoption
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-layouts.client>
