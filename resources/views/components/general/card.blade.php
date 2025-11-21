<article class="bg-white rounded-card overflow-hidden w-full flex flex-col">
    <div>
        <img src="{{ asset('images/dog1.png') }}" alt="" class="block w-full"/>
    </div>
    <div class="p-4 flex flex-col flex-grow">
        <span class="text-background-green italic font-bold">{{ $age }}</span>
        <h3 class="font-bold text-2xl md:text-4xl">{{ $name }}</h3>
        <h4 class="italic">{{ $race }}</h4>
        <p class="flex-grow">{{ $description }}</p>
        <a href="#" class="bg-cta-orange hover:bg-cta-hover text-white py-2 px-4 block text-center rounded-button mt-4">En savoir plus -></a>
    </div>
</article>
