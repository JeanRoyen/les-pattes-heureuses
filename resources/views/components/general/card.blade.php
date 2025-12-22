<article class="bg-white rounded-card overflow-hidden flex flex-col col-span-8 md:col-span-4 lg:col-span-2">
    @if ($picture && Storage::disk('public')->exists($picture))
        <img src="{{ asset('storage/' . $picture) }}" alt="{{ $name }}" class="block w-full h-48 object-cover"/>
    @else
        <div class="w-full h-48 bg-gray-200 flex items-center justify-center">
            Pas d'image
        </div>
    @endif

    <div class="p-4 flex flex-col flex-grow">
        <span class="text-background-green italic font-bold text-sm">{{ $age }}</span>
        <h3 class="font-bold text-xl">{{ $name }}</h3>
        <p class="font-bold">{{ $gender ? 'Mâle' : 'Femelle' }}</p>
        <p class="italic text-sm text-gray-600">{{ $race }}</p>
        <p class="flex-grow text-sm my-2 line-clamp-3">{{ $description }}</p>
        <a href="#" class="bg-cta-orange hover:bg-cta-hover text-white py-2 px-4 block text-center rounded-button mt-auto text-sm">
            En savoir plus →
        </a>
    </div>
</article>
