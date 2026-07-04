<article class="bg-white rounded-card overflow-hidden flex flex-col col-span-8 md:col-span-4 lg:col-span-2 shadow-sm">
    <div class="relative">
        @if ($picture && Storage::disk('public')->exists($picture))
            <img
                src="{{ asset('storage/' . $picture) }}"
                alt="{{ $name }}"
                class="block w-full h-96 object-cover"
            />
        @else
            <div class="w-full h-96 bg-gray-200 flex items-center justify-center">
                Pas d'image
            </div>
        @endif

        <span
            @class([
                'absolute top-3 right-3 px-3 py-1 rounded-full text-sm text-white font-medium',
                'bg-green-600' => $status === 'available',
                'bg-orange-500' => $status === 'in_care',
            ])
        >
            {{ __('animals.status_' . $status) }}
        </span>
    </div>

    <div class="p-5 flex flex-col grow">
        <div class="flex justify-between items-start gap-3">
            <div>
                <h3 class="font-bold text-2xl text-text">
                    {{ $name }}
                </h3>

                <p class="text-sm text-background-green font-semibold">
                    {{ $age }}
                </p>
            </div>

            <span
    @class([
        'text-sm font-medium px-3 py-1 rounded-full',
        'bg-blue-100 text-blue-700' => $gender,
        'bg-pink-100 text-pink-700' => ! $gender,
    ])
>
    {{ $gender ? 'Mâle' : 'Femelle' }}
</span>
        </div>

        <div class="mt-4 space-y-1">
            <p class="text-sm uppercase tracking-wide text-gray-500">
                {{ $species }}
            </p>

            <p class="text-sm font-medium text-gray-700">
                {{ $race }}
            </p>
        </div>

        <p class="grow text-sm text-gray-600 my-4 line-clamp-3">
            {!! $description !!}
        </p>

        <a
            href="{{ $route }}"
            class="bg-cta-orange hover:bg-cta-hover text-white py-2 px-4 block text-center rounded-button mt-auto text-sm font-medium"
        >
            En savoir plus →
        </a>
    </div>
</article>
